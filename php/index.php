<?php
require_once __DIR__ . '/PremiumFormatCinemaFilm.php';
session_name('absolute_cinema_session');
session_start();

// genre list for validation and dropdown options
$genres = [
	'action', 'comedy', 'drama', 'horror', 'romance', 'sci-fi', 'thriller', 'documentary',
	'animation', 'adventure', 'fantasy', 'mystery', 'musical', 'western', 'crime', 'biography',
	'family', 'war', 'sport', 'history', 'news', 'reality', 'talk show', 'game show', 'variety',
	'short', 'experimental', 'silent', 'cult', 'classic', 'independent', 'foreign', 'art house',
	'avant-garde', 'surrealist', 'expressionist', 'neo-realist', 'postmodernist', 'new wave', 'dogme 95',
	'mockumentary', 'found footage', 'slasher', 'psychological thriller', 'superhero', 'martial arts',
	'spy', 'heist', 'disaster', 'zombie', 'post-apocalyptic', 'dystopian', 'steampunk', 'cyberpunk',
	'space opera', 'time travel', 'alternate history', 'historical fiction', 'biographical drama',
	'political thriller', 'legal drama', 'medical drama', 'sports drama', 'teen drama', 'coming-of-age',
	'road', 'buddy', 'ensemble cast', 'anthology', 'experimental narrative', 'nonlinear narrative',
	'metafictional', 'self-reflexive', 'mockumentary style'
];

// initialize the film list in the session with the sample premium cinema films
$initializeFilmList = !isset($_SESSION['filmList']) || !is_array($_SESSION['filmList']) || empty($_SESSION['filmList']);
if (!$initializeFilmList) {
	foreach ($_SESSION['filmList'] as $film) {
		if (!($film instanceof PremiumFormatCinemaFilm)) {
			$initializeFilmList = true;
			break;
		}
	}
}

if ($initializeFilmList) {
	$_SESSION['filmList'] = [
		new PremiumFormatCinemaFilm(
			'PCF001', 'The Odyssey', 'fantasy', 172, 8.4,
			'Universal Pictures', 'R', 41, 'IMAX 70mm', 27, false, '/images/to.png'
		),
		new PremiumFormatCinemaFilm(
			'PCF002', 'Resident Evil', 'horror', 94, 7.7,
			'Sony Pictures Releasing', 'R', 19, 'ScreenX', 10, false, '/images/re.png'
		),
		new PremiumFormatCinemaFilm(
			'PCF003', 'Spider-Man: Brand New Day', 'action', 144, 8.0,
			'Sony Pictures Releasing', 'PG-13', 19, '4DX', 12, true, '/images/smbnd.png'
		),
		new PremiumFormatCinemaFilm(
			'PCF004', 'Practical Magic 2', 'romance', 130, 6.3,
			'Warner Bros. Pictures', 'PG-13', 19, '4DX', 5, true, '/images/pm2.png'
		),
		new PremiumFormatCinemaFilm(
			'PCF005', 'Heart of the Beast', 'thriller', 101, 7.2,
			'Paramount Pictures', 'PG-13', 22, 'Dolby Atmos', 4, false, '/images/hotb.png'
		)
	];
}

// reference to the film list in session for easier access
$filmList = &$_SESSION['filmList'];
$errors = [];
$message = '';
$formData = [
	'filmCode' => '',
	'title' => '',
	'genre' => '',
	'distributor' => '',
	'ageRating' => '',
	'duration' => '',
	'baseTicketPrice' => '',
	'averageRating' => '',
	'screenFormat' => '',
	'priceSurcharge' => '',
	'requires3DGlasses' => 'false',
	'image' => ''
];

// utility functions
function escapeHtml($value)
{
	return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// retrieves a film object from the list by its code, or returns null if not found
function getFilmByCode($filmList, $filmCode)
{
	// search for the film in the list by its code
	foreach ($filmList as $film) {
		// if found return the film object
		if ($film->getFilmCode() === $filmCode) {
			return $film;
		}
	}

	// if not found return null
	return null;
}

// validates the film data and returns an array of error messages for any invalid fields
function validateFilmData($data, $genres, $filmList)
{
	// array to hold error messages
	$errors = [];

	// error handling if film code does not match the required format
	if (!preg_match('/^PCF\d{3}$/', $data['filmCode'])) {
		$errors['filmCode'] = 'code must use the format PCF000.';
	}
	// error handling if film code already exists in the list
	else if (getFilmByCode($filmList, $data['filmCode']) !== null) {
		$errors['filmCode'] = 'this film code already exists.';
	}

	// error handling if film title is empty
	if ($data['title'] === '') {
		$errors['title'] = 'title is required.';
	}

	// error handling if film genre is not in the list of genres
	if (!in_array($data['genre'], $genres, true)) {
		$errors['genre'] = 'please select a valid genre.';
	}

	// error handling if film duration is not a valid integer
	if (filter_var($data['duration'], FILTER_VALIDATE_INT) === false) {
		$errors['duration'] = 'duration must be a whole number.';
	}
	// error handling if film duration is not within the valid range
	else if ((int) $data['duration'] < 0 || (int) $data['duration'] > 873) {
		$errors['duration'] = 'duration must be between 0 and 873 minutes.';
	}

	// error handling if base ticket price is not a valid integer
	if (filter_var($data['baseTicketPrice'], FILTER_VALIDATE_INT) === false) {
		$errors['baseTicketPrice'] = 'base ticket price must be a whole number.';
	}
	// error handling if base ticket price is not within the valid range
	else if ((int) $data['baseTicketPrice'] < 0 || (int) $data['baseTicketPrice'] > 500) {
		$errors['baseTicketPrice'] = 'base ticket price must be between 0 and 500 dollars.';
	}

	// error handling if average rating is not a valid number
	if (filter_var($data['averageRating'], FILTER_VALIDATE_FLOAT) === false) {
		$errors['averageRating'] = 'average rating must be a number.';
	}
	// error handling if average rating is not within the valid range
	else if ((float) $data['averageRating'] < 0 || (float) $data['averageRating'] > 10) {
		$errors['averageRating'] = 'average rating must be between 0 and 10.';
	}

	// error handling if price surcharge is not a valid integer
	if (filter_var($data['priceSurcharge'], FILTER_VALIDATE_INT) === false) {
		$errors['priceSurcharge'] = 'price surcharge must be a whole number.';
	}
	// error handling if price surcharge is negative
	else if ((int) $data['priceSurcharge'] < 0) {
		$errors['priceSurcharge'] = 'price surcharge cannot be negative.';
	}

	// error handling if the 3D glasses value is not true or false
	if (!in_array($data['requires3DGlasses'], ['true', 'false'], true)) {
		$errors['requires3DGlasses'] = 'please select true or false.';
	}

	// return the array of error messages
	return $errors;
}

// handles the upload of a new film image and returns the path to the uploaded image
function saveUploadedImage($file, &$errors, $currentImage = '')
{
	// error handling if no file is uploaded and no current image exists
	if (!isset($file) || !isset($file['error']) || $file['error'] === UPLOAD_ERR_NO_FILE) {
		if ($currentImage === '') {
			$errors['image'] = 'an image is required.';
		}

		return $currentImage;
	}

	// error handling if there is an error during file upload
	if ($file['error'] !== UPLOAD_ERR_OK) {
		$errors['image'] = 'the image could not be uploaded.';
		return $currentImage;
	}

	// error handling if the uploaded file is not a valid image type
	$allowedTypes = ['image/jpeg', 'image/png'];
	$imageType = mime_content_type($file['tmp_name']);
	if (!in_array($imageType, $allowedTypes, true)) {
		$errors['image'] = 'image must be a valid JPG, JPEG, or PNG file.';
		return $currentImage;
	}

	// create the images directory if it does not exist
	$uploadDirectory = __DIR__ . '/images';
	if (!is_dir($uploadDirectory)) {
		mkdir($uploadDirectory, 0755, true);
	}

	// generate a unique filename for the uploaded image and move it to the images directory
	$extension = $imageType === 'image/png' ? 'png' : 'jpg';
	$fileName = uniqid('film_', true) . '.' . $extension;
	$targetPath = $uploadDirectory . '/' . $fileName;
	// error handling if the uploaded file could not be moved to the target directory
	if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
		$errors['image'] = 'the image could not be saved.';
		return $currentImage;
	}

	// return the relative path to the uploaded image
	return 'images/' . $fileName;
}

// handle adding a premium format cinema film
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && ($_POST['action'] ?? '') === 'add') {
	// populate form data from form submission
	$formData = [
		'filmCode' => trim($_POST['filmCode'] ?? ''),
		'title' => trim($_POST['title'] ?? ''),
		'genre' => $_POST['genre'] ?? '',
		'distributor' => trim($_POST['distributor'] ?? ''),
		'ageRating' => trim($_POST['ageRating'] ?? ''),
		'duration' => trim($_POST['duration'] ?? ''),
		'baseTicketPrice' => trim($_POST['baseTicketPrice'] ?? ''),
		'averageRating' => trim($_POST['averageRating'] ?? ''),
		'screenFormat' => trim($_POST['screenFormat'] ?? ''),
		'priceSurcharge' => trim($_POST['priceSurcharge'] ?? ''),
		'requires3DGlasses' => $_POST['requires3DGlasses'] ?? '',
		'image' => $_POST['currentImage'] ?? ''
	];

	// validate the form data and save the uploaded image if provided
	$errors = validateFilmData($formData, $genres, $filmList);
	$formData['image'] = saveUploadedImage($_FILES['filmImage'] ?? null, $errors, $formData['image']);

	// if there are no errors, create a premium format cinema film
	if (empty($errors)) {
		$filmList[] = new PremiumFormatCinemaFilm(
			$formData['filmCode'],
			$formData['title'],
			$formData['genre'],
			(int) $formData['duration'],
			(float) $formData['averageRating'],
			$formData['distributor'],
			$formData['ageRating'],
			(int) $formData['baseTicketPrice'],
			$formData['screenFormat'],
			(int) $formData['priceSurcharge'],
			$formData['requires3DGlasses'] === 'true',
			$formData['image']
		);
		$message = 'new film has been added.';

		// reset form data for the next entry
		$formData = array_fill_keys(array_keys($formData), '');
		$formData['requires3DGlasses'] = 'false';
	}
}

// check if the absolute cinema easter egg should be shown
$showAbsoluteCinema = isset($_GET['absoluteCinema']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>absolute cinema</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600;700&family=Oxanium:wght@700&display=swap" rel="stylesheet">
	<style>
		:root { color-scheme: dark; --ink: #f0f6fc; --muted: #8b949e; --accent: #f5c518; --accent-hover: #d9ad00; --line: #30363d; --paper: #0d1117; --surface: #161b22; --input: #0d1117; }
		* { box-sizing: border-box; }
		body { margin: 0; background: var(--paper); color: var(--ink); font-family: 'IBM Plex Mono', monospace; }
		main { width: calc(100% - 32px); max-width: 1180px; margin: 40px auto; }
		header { display: flex; justify-content: space-between; align-items: end; gap: 24px; margin-bottom: 28px; }
		h1 { margin: 0; font-family: 'Oxanium', sans-serif; font-size: clamp(2rem, 5vw, 4.1rem); line-height: 1.1; }
		header p { max-width: 330px; margin: 0 0 5px; color: var(--muted); line-height: 1.5; }
		.layout { display: grid; grid-template-columns: 330px minmax(0, 1fr); gap: 24px; align-items: start; }
		.panel, .tableWrap { background: var(--surface); border: 1px solid var(--line); box-shadow: 8px 8px 0 #010409; }
		.panel { padding: 22px; }
		.tableWrap { min-width: 0; }
		h2 { margin: 0 0 18px; font-size: 1.4rem; }
		label { display: block; margin: 13px 0 6px; font: 700 0.78rem/1.2 'IBM Plex Mono', monospace; letter-spacing: 0.06em; }
		input, select { width: 100%; padding: 10px 11px; border: 1px solid #484f58; border-radius: 0; background: var(--input); color: var(--ink); font: 1rem 'IBM Plex Mono', monospace; }
		input:focus, select:focus { outline: 2px solid var(--accent); outline-offset: 1px; }
		button, .button { border: 0; padding: 11px 14px; background: var(--accent); color: #111; cursor: pointer; font: 700 0.82rem 'IBM Plex Mono', monospace; letter-spacing: 0.04em; text-decoration: none; }
		button:hover, .button:hover { background: var(--accent-hover); }
		.titleLink { color: inherit; text-decoration: none; }
		.titleLink:hover { color: var(--accent); }
		.cinemaScreen { min-height: 100vh; display: grid; place-items: center; padding: 24px; background: #000; }
		.cinemaScreen img { display: block; width: 100%; height: 100vh; object-fit: contain; }
		.submit { width: 100%; margin-top: 18px; }
		.error { margin: 5px 0 0; color: #ff7b72; font: 0.78rem 'IBM Plex Mono', monospace; }
		.notice { padding: 12px 14px; margin-bottom: 18px; background: #12261a; border-left: 4px solid #3fb950; font: 0.9rem 'IBM Plex Mono', monospace; }
		.tableTop { display: flex; justify-content: space-between; align-items: center; gap: 16px; padding: 18px 20px; border-bottom: 1px solid var(--line); }
		.tableTop h2 { display: inline-block; margin: 0; padding: 10px 13px; background: var(--accent); color: #111; font: 700 1.15rem/1.1 'IBM Plex Mono', monospace; letter-spacing: 0.04em; white-space: nowrap; }
		.tableScroll { max-width: 100%; overflow-x: auto; scrollbar-color: var(--accent) #21262d; scrollbar-width: thin; }
		.tableScroll::-webkit-scrollbar { height: 10px; }
		.tableScroll::-webkit-scrollbar-track { background: #21262d; }
		.tableScroll::-webkit-scrollbar-thumb { background: var(--accent); border: 2px solid #21262d; }
		table { --film-number-width: 58px; width: 100%; border-collapse: separate; border-spacing: 0; min-width: 1200px; }
		th, td { padding: 13px 12px; border-bottom: 1px solid var(--line); text-align: left; vertical-align: middle; }
		th { background: #21262d; font: 700 0.72rem 'IBM Plex Mono', monospace; letter-spacing: 0.06em; white-space: nowrap; }
		td { background: var(--surface); font-size: 0.95rem; }
		th:first-child, td:first-child { position: sticky; left: 0; z-index: 2; width: var(--film-number-width); min-width: var(--film-number-width); }
		th:nth-child(2), td:nth-child(2) { position: sticky; left: var(--film-number-width); z-index: 2; min-width: 220px; }
		th:first-child, td:first-child, th:nth-child(2), td:nth-child(2) { border-right: 1px solid var(--line); }
		tbody tr { transition: background-color 0.15s ease; }
		tbody tr:hover td { background-color: #202733; }
		tr:last-child td { border-bottom: 0; }
		.poster { width: 48px; height: 64px; object-fit: cover; display: block; background: #21262d; }
		.empty { padding: 45px 20px; text-align: center; color: var(--muted); }
		@media (max-width: 800px) { main { margin: 24px auto; } header, .layout { display: block; } header p { margin-top: 12px; } .panel { margin-bottom: 24px; } .tableTop { align-items: stretch; flex-direction: column; } }
	</style>
</head>
<body>
<?php if ($showAbsoluteCinema): ?>
	<a class="cinemaScreen" href="index.php" aria-label="Return to film list">
		<img src="images/absolute_cinema.png" alt="absolute cinema">
	</a>
<?php else: ?>
<main>
	<header>
		<h1><a class="titleLink" href="?absoluteCinema=1">absolute cinema.</a></h1>
		<p>PHP edition.</p>
	</header>

	<?php if ($message !== ''): ?>
		<div class="notice"><?= escapeHtml($message) ?></div>
	<?php endif; ?>

	<div class="layout">
		<section class="panel">
			<h2>add new film</h2>
			<?php if (!empty($errors)): ?>
				<div class="error">please correct the highlighted fields.</div>
			<?php endif; ?>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="currentImage" value="<?= escapeHtml($formData['image']) ?>">

				<label for="filmCode">code</label>
				<input id="filmCode" name="filmCode" value="<?= escapeHtml($formData['filmCode']) ?>" placeholder="PCF000" required>
				<?php if (isset($errors['filmCode'])): ?><p class="error"><?= escapeHtml($errors['filmCode']) ?></p><?php endif; ?>

				<label for="title">title</label>
				<input id="title" name="title" value="<?= escapeHtml($formData['title']) ?>" required>
				<?php if (isset($errors['title'])): ?><p class="error"><?= escapeHtml($errors['title']) ?></p><?php endif; ?>

				<label for="genre">genre</label>
				<select id="genre" name="genre" required>
					<option value="">Select a genre</option>
					<?php foreach ($genres as $genre): ?>
						<option value="<?= escapeHtml($genre) ?>" <?= $formData['genre'] === $genre ? 'selected' : '' ?>><?= escapeHtml($genre) ?></option>
					<?php endforeach; ?>
				</select>
				<?php if (isset($errors['genre'])): ?><p class="error"><?= escapeHtml($errors['genre']) ?></p><?php endif; ?>

				<label for="distributor">distributor</label>
				<input id="distributor" name="distributor" value="<?= escapeHtml($formData['distributor']) ?>">
				<?php if (isset($errors['distributor'])): ?><p class="error"><?= escapeHtml($errors['distributor']) ?></p><?php endif; ?>

				<label for="ageRating">age rating</label>
				<input id="ageRating" name="ageRating" value="<?= escapeHtml($formData['ageRating']) ?>">
				<?php if (isset($errors['ageRating'])): ?><p class="error"><?= escapeHtml($errors['ageRating']) ?></p><?php endif; ?>

				<label for="duration">duration (minutes)</label>
				<input id="duration" name="duration" type="number" min="0" max="873" value="<?= escapeHtml($formData['duration']) ?>" required>
				<?php if (isset($errors['duration'])): ?><p class="error"><?= escapeHtml($errors['duration']) ?></p><?php endif; ?>

				<label for="baseTicketPrice">base ticket price (US dollars)</label>
				<input id="baseTicketPrice" name="baseTicketPrice" type="number" min="0" max="500" value="<?= escapeHtml($formData['baseTicketPrice']) ?>" required>
				<?php if (isset($errors['baseTicketPrice'])): ?><p class="error"><?= escapeHtml($errors['baseTicketPrice']) ?></p><?php endif; ?>

				<label for="averageRating">average rating (out of 10)</label>
				<input id="averageRating" name="averageRating" type="number" min="0" max="10" step="any" value="<?= escapeHtml($formData['averageRating']) ?>" required>
				<?php if (isset($errors['averageRating'])): ?><p class="error"><?= escapeHtml($errors['averageRating']) ?></p><?php endif; ?>

				<label for="screenFormat">screen format</label>
				<input id="screenFormat" name="screenFormat" value="<?= escapeHtml($formData['screenFormat']) ?>">
				<?php if (isset($errors['screenFormat'])): ?><p class="error"><?= escapeHtml($errors['screenFormat']) ?></p><?php endif; ?>

				<label for="priceSurcharge">price surcharge</label>
				<input id="priceSurcharge" name="priceSurcharge" type="number" min="0" value="<?= escapeHtml($formData['priceSurcharge']) ?>" required>
				<?php if (isset($errors['priceSurcharge'])): ?><p class="error"><?= escapeHtml($errors['priceSurcharge']) ?></p><?php endif; ?>

				<label for="requires3DGlasses">requires 3D glasses (true/false)</label>
				<select id="requires3DGlasses" name="requires3DGlasses" required>
					<option value="true" <?= $formData['requires3DGlasses'] === 'true' ? 'selected' : '' ?>>true</option>
					<option value="false" <?= $formData['requires3DGlasses'] === 'false' ? 'selected' : '' ?>>false</option>
				</select>
				<?php if (isset($errors['requires3DGlasses'])): ?><p class="error"><?= escapeHtml($errors['requires3DGlasses']) ?></p><?php endif; ?>

				<label for="image">image</label>
				<input id="image" name="filmImage" type="file" accept=".jpg,.jpeg,.png,image/jpeg,image/png" <?= $formData['image'] === '' ? 'required' : '' ?>>
				<?php if ($formData['image'] !== ''): ?><p class="error" style="color: var(--muted);">current image will be kept if no new image is selected.</p><?php endif; ?>
				<?php if (isset($errors['image'])): ?><p class="error"><?= escapeHtml($errors['image']) ?></p><?php endif; ?>

				<button class="submit" type="submit">add film</button>
			</form>
		</section>

		<section class="tableWrap">
			<div class="tableTop">
				<h2>film list <small>(<?= count($filmList) ?>)</small></h2>
			</div>
			<?php if (empty($filmList)): ?>
				<div class="empty">no films found.</div>
			<?php else: ?>
				<div class="tableScroll">
					<table>
						<thead><tr><th>no.</th><th>film</th><th>image</th><th>genre</th><th>duration</th><th>rating</th><th>distributor</th><th>age rating</th><th>base price</th><th>screen format</th><th>surcharge</th><th>3D glasses</th></tr></thead>
						<tbody>
						<?php $filmNumber = 1; ?>
						<?php foreach ($filmList as $film): ?>
							<tr>
								<td><?= $filmNumber++ ?></td>
								<td><strong><?= escapeHtml($film->getTitle()) ?></strong><br><small><?= escapeHtml($film->getFilmCode()) ?></small></td>
								<td><?php if ($film->getImage() !== ''): ?><img class="poster" src="<?= escapeHtml($film->getImage()) ?>" alt="<?= escapeHtml($film->getTitle()) ?> poster"><?php else: ?><span>no image</span><?php endif; ?></td>
								<td><?= escapeHtml($film->getGenre()) ?></td>
								<td><?= escapeHtml($film->getDuration()) ?> min</td>
								<td><?= escapeHtml($film->getAverageRating()) ?>/10</td>
								<td><?= escapeHtml($film->getDistributor()) ?></td>
								<td><?= escapeHtml($film->getAgeRating()) ?></td>
								<td>$<?= escapeHtml($film->getBaseTicketPrice()) ?></td>
								<td><?= escapeHtml($film->getScreenFormat()) ?></td>
								<td>$<?= escapeHtml($film->getPriceSurcharge()) ?></td>
								<td><?= $film->getRequires3DGlasses() ? 'true' : 'false' ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<?php endif; ?>
		</section>
	</div>
</main>
<?php endif; ?>
</body>
</html>
