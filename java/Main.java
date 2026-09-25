import java.util.ArrayList;
import java.util.Arrays;
import java.util.Scanner;

public class Main {
    private static final Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        // an array of absolute cinema film genres
        final ArrayList<String> genres = new ArrayList<>(Arrays.asList(
            "action", "comedy", "drama", "horror", "romance", "sci-fi", "thriller", "documentary",
            "animation", "adventure", "fantasy", "mystery", "musical", "western", "crime", "biography",
            "family", "war", "sport", "history", "news", "reality", "talk show", "game show", "variety",
            "short", "experimental", "silent", "cult", "classic", "independent", "foreign", "art house",
            "avant-garde", "surrealist", "expressionist", "neo-realist", "postmodernist", "new wave", "dogme 95",
            "mockumentary", "found footage", "slasher", "psychological thriller", "superhero", "martial arts",
            "spy", "heist", "disaster", "zombie", "post-apocalyptic", "dystopian", "steampunk", "cyberpunk",
            "space opera", "time travel", "alternate history", "historical fiction", "biographical drama",
            "political thriller", "legal drama", "medical drama", "sports drama", "teen drama", "coming-of-age",
            "road", "buddy", "ensemble cast", "anthology", "experimental narrative", "nonlinear narrative",
            "metafictional", "self-reflexive", "mockumentary style"
        ));

        // a dynamic array to store absolute premium cinema films
        ArrayList<PremiumFormatCinemaFilm> premiumFormatCinemaFilms = new ArrayList<>(Arrays.asList(
            new PremiumFormatCinemaFilm("PCF001", "The Odyssey", "fantasy", 172, 8.4f, "Universal Pictures", "R", 41, "IMAX 70mm", 27, false),
            new PremiumFormatCinemaFilm("PCF002", "Resident Evil", "horror", 94, 7.7f, "Sony Pictures Releasing", "R", 19, "ScreenX", 10, false),
            new PremiumFormatCinemaFilm("PCF003", "Spider-Man: Brand New Day", "action", 144, 8.0f, "Sony Pictures Releasing", "PG-13", 19, "4DX", 12, true),
            new PremiumFormatCinemaFilm("PCF004", "Practical Magic 2", "romance", 130, 6.3f, "Warner Bros. Pictures", "PG-13", 19, "4DX", 5, true),
            new PremiumFormatCinemaFilm("PCF005", "Heart of the Beast", "thriller", 101, 7.2f, "Paramount Pictures", "PG-13", 22, "Dolby Atmos", 4, false)
        ));

        // print welcome message and menu
        System.out.println("====================================================\n");

        System.out.println("       ( )                 (_ )        ( )_        ");
        System.out.println("   _ _ | |_     ___    _    | |  _   _ | ,_)   __  ");
        System.out.println(" /'_` )| '_`\\ /',__) /'_`\\  | | ( ) ( )| |   /'__`\\");
        System.out.println("( (_| || |_) )\\__, \\( (_) ) | | | (_) || |_ (  ___/");
        System.out.println("`\\__,_)(_,__/'(____/`\\___/'(___)`\\___/'`\\__)`\\____)");
        System.out.println("                               _                   ");
        System.out.println(" _ _    _ __   __    ___ ___  (_) _   _   ___ ___  ");
        System.out.println("( '_`\\ ( '__)/'__`\\/' _ ` _ `\\| |( ) ( )/' _ ` _ `\\");
        System.out.println("| (_) )| |  (  ___/| ( ) ( ) || || (_) || ( ) ( ) |");
        System.out.println("| ,__/'(_)  `\\____)(_) (_) (_)(_)`\\___/'(_) (_) (_)`");
        System.out.println("| |                                                ");
        System.out.println("(_)___ (_)  ___     __    ___ ___     _ _          ");
        System.out.println(" /'___)| |/' _ `\\ /'__`\\/' _ ` _ `\\ /'_` )         ");
        System.out.println("( (___ | || ( ) |(  ___/| ( ) ( ) |( (_| | _       ");
        System.out.println("`\\____)(_)(_) (_)`\\____)(_) (_) (_)`\\__,_)(_)      (java edition.)");

        System.out.println("\n====================================================");

        System.out.println(" __   __                         __   __ ");
        System.out.println("/  ` /  \\  |\\/|  |\\/|  /\\  |\\ | |  \\ /__`");
        System.out.println("\\__, \\__/  |  |  |  | /~~\\ | \\| |__/ .__/\n");

        System.out.println("1. /add (ADD NEW ABSOLUTE CINEMA FILM)");
        System.out.println("2. /display (DISPLAY ALL ABSOLUTE CINEMA FILM)");
        System.out.println("3. /exit (EXIT)");

        System.out.println("\nenter your command: ");

        // loop to continuously accept user commands
        while (true) {
            System.out.print(">> ");
            // get the command from input
            String command = scanner.nextLine();

            // call the respective method based on the function
            if (command.equals("/add")) {
                addFilm(premiumFormatCinemaFilms, genres);
            }
            else if (command.equals("/display")) {
                displayFilms(premiumFormatCinemaFilms);
            }
            else if (command.equals("/exit")) {
                System.out.println("                          _  _                      ");
                System.out.println("                         ( )( )                     ");
                System.out.println("   __     _      _      _| || |_    _   _    __     ");
                System.out.println(" /'_ `\\ /'_`\\  /'_`\\  /'_` || '_`\\ ( ) ( ) /'__`\\");
                System.out.println("( (_) |( (_) )( (_) )( (_| || |_) )| (_) |(  ___/ _ ");
                System.out.println("`\\__  |`\\___/'`\\___/'`\\__,_)(_,__/'`\\__, |`\\____)(_)");
                System.out.println("( )_) |                            ( )_| |          ");
                System.out.println(" \\___/'                            `\\___/'          ");
                return;
            }
            else {
                System.out.println("\ninvalid command.\n");
            }
        }
    }

    // function to calculate the width of every table column
    private static ArrayList<Integer> calculateColumnWidths(ArrayList<ArrayList<String>> rows) {
        // create one width entry for each table column
        ArrayList<Integer> columnWidths = new ArrayList<>();
        for (int column = 0; column < rows.get(0).size(); ++column) {
            columnWidths.add(0); // initialize every column width to zero
        }

        // check every value in every row
        for (ArrayList<String> row : rows) { // visit every table row
            // inspect each cell in the current row
            for (int column = 0; column < row.size(); ++column) { // visit every cell in the row
                // keep the widest value found for this column
                columnWidths.set(column, Math.max(columnWidths.get(column), row.get(column).length())); // keep the largest cell width
            }
        }

        // return the calculated column widths
        return columnWidths;
    }

    // function to print the table border
    private static void printTableBorder(ArrayList<Integer> columnWidths) {
        // print the left border
        System.out.print("※");

        // reserve two spaces around each cell's content
        for (int width : columnWidths) { // draw one section for each column
            // draw the horizontal border for the current column
            System.out.print("-".repeat(width + 2) + "※"); // draw the horizontal border for this column
        }

        // move to the next line
        System.out.println();
    }

    // function to print the table header
    private static void printTableHeader(ArrayList<Integer> columnWidths) {
        // define the headers shown above the film data
        ArrayList<String> headers = new ArrayList<>(Arrays.asList(
            "No.", "Title", "Code", "Genre", "Duration", "Rating", "Distributor", "Age Rating", "Ticket Price", "Screen Format", "Price Surcharge", "3D Glasses" // list each header label
        ));

        // print the header row
        printTableRow(headers, columnWidths);
    }

    // function to print one table row
    private static void printTableRow(ArrayList<String> row, ArrayList<Integer> columnWidths) {
        // print the left border
        System.out.print("⋮");

        // print every value with its calculated width
        for (int column = 0; column < row.size(); ++column) {
            // print one space before the value and one space after its padded width
            System.out.print(" " + String.format("%-" + (columnWidths.get(column) + 1) + "s", row.get(column)) + "⋮");
        }

        // move to the next line
        System.out.println();
    }

    // function to display all films
    private static void displayFilms(ArrayList<PremiumFormatCinemaFilm> filmList) {
        // error handling if the film list is empty
        if (filmList.isEmpty()) {
            System.out.println("non absolute cinema. no film.\n");
            return;
        }

        // store the table header and film rows
        ArrayList<ArrayList<String>> rows = new ArrayList<>();
        rows.add(new ArrayList<>(Arrays.asList(
            "No.", "Title", "Code", "Genre", "Duration", "Rating", "Distributor", "Age Rating", "Ticket Price", "Screen Format", "Price Surcharge", "3D Glasses" // add the header row
        )));
        // number the films starting from one
        int filmNumber = 1;

        // convert every film into a table row
        for (PremiumFormatCinemaFilm film : filmList) {
            // convert the numeric rating to text
            String averageRating = Float.toString(film.getAverageRating()).replaceFirst("\\.0$", "");

            // add the film's display values to the table rows
            rows.add(new ArrayList<>(Arrays.asList( // append the film as a display row
                Integer.toString(filmNumber++), // add the film number
                film.getTitle(), // add the film title
                film.getFilmCode(), // add the film code
                film.getGenre(), // add the film genre
                Integer.toString(film.getDuration()) + " minutes", // add the film duration
                averageRating + "/10", // add the average rating
                film.getDistributor(), // add the distributor
                film.getAgeRating(), // add the age rating
                "$" + Integer.toString(film.getBaseTicketPrice()), // add the base ticket price
                film.getScreenFormat(), // add the screen format
                "$" + Integer.toString(film.getPriceSurcharge()), // add the price surcharge
                film.getRequires3DGlasses() ? "true" : "false" // add the 3D glasses requirement
            )));
        }

        // calculate widths from headers and film data
        ArrayList<Integer> columnWidths = calculateColumnWidths(rows);

        // print the table title
        System.out.println("\nabsolute cinema. list of films:");

        // print the table header and rows
        printTableBorder(columnWidths);
        printTableHeader(columnWidths);
        printTableBorder(columnWidths);
        // print each film row below the headings
        for (int row = 1; row < rows.size(); ++row) {
            printTableRow(rows.get(row), columnWidths);
        }
        // draw the bottom border
        printTableBorder(columnWidths);

        // print total films
        System.out.println("total absolute cinema films: " + filmList.size() + "\n");
    }

    // function to add new film
    private static void addFilm(ArrayList<PremiumFormatCinemaFilm> filmList, ArrayList<String> genres) {
        // ask user for film code
        System.out.print("\ncode: ");
        // read film code
        String code = scanner.nextLine();
        // error handling for film code format
        while (true) {
            if (!code.matches("^PCF\\d{3}$")) {
                System.out.println("non absolute cinema. invalid code. format must be PCF000.\n");
            }
            else {
                // error handling if film code already exists
                boolean codeExists = false;
                for (PremiumFormatCinemaFilm film : filmList) {
                    if (film.getFilmCode().equals(code)) {
                        codeExists = true;
                        break;
                    }
                }

                if (!codeExists) {
                    break;
                }

                System.out.println("non absolute cinema. film code already exists. please enter a different code.\n");
            }

            System.out.print("code: ");
            code = scanner.nextLine();
        }

        // ask and read film title
        System.out.print("title: ");
        String title = scanner.nextLine();

        // ask and read film genre
        System.out.print("genre: ");
        String genre = scanner.nextLine();
        // error handling for film genre if the genre is not in the list
        while (!genres.contains(genre)) {
            System.out.print("non absolute cinema. invalid genre. please enter a valid genre from this list: [");
            for (int i = 0; i < genres.size(); ++i) {
                if (i > 0) {
                    System.out.print(", ");
                }
                System.out.print(genres.get(i));
            }
            System.out.println("]\n");
            System.out.print("genre: ");
            genre = scanner.nextLine();
        }

        // ask and read film distributor
        System.out.print("distributor: ");
        String distributor = scanner.nextLine();

        // ask and read age rating
        System.out.print("age rating: ");
        String ageRating = scanner.nextLine();

        // ask for duration
        System.out.print("duration (minutes): ");
        int duration;
        while (true) {
            // input the duration as string
            String durationInput = trimTrailingWhitespace(scanner.nextLine());
            // error handling if number contains letters or is decimal
            if (!durationInput.matches("^\\d+$")) {
                System.out.println("non absolute cinema. invalid duration. only nonnegative integer numbers are allowed.");
            }
            else {
                // error handling if duration is not a number
                try {
                    duration = Integer.parseInt(durationInput);
                    // error handling if duration is more than 873 minutes
                    if (duration > 873) {
                        System.out.print("non absolute cinema. even the longest cinema film in history is only 873 minutes long. please enter a valid duration.");
                    }
                    else {
                        break;
                    }
                }
                catch (NumberFormatException exception) {
                    System.out.print("non absolute cinema. invalid duration. input is not a valid number.");
                }
                System.out.println();
            }
            // keep asking for duration until valid
            System.out.print("\nduration (minutes): ");
        }

        // ask for base ticket price
        System.out.print("base ticket price (us dollars): ");
        int baseTicketPrice;
        while (true) {
            // input the base ticket price as string
            String baseTicketPriceInput = trimTrailingWhitespace(scanner.nextLine());
            // error handling if number contains letters or is decimal
            if (!baseTicketPriceInput.matches("^\\d+$")) {
                System.out.println("non absolute cinema. invalid base ticket price. only nonnegative integer numbers are allowed.");
            }
            else {
                // error handling if base ticket price is not a number
                try {
                    baseTicketPrice = Integer.parseInt(baseTicketPriceInput);
                    // error handling if base ticket price is more than 500 dollars
                    if (baseTicketPrice > 500) {
                        System.out.print("non absolute cinema. invalid base ticket price. the maximum ticket price is 500 dollars.");
                    }
                    else {
                        break;
                    }
                }
                catch (NumberFormatException exception) {
                    System.out.print("non absolute cinema. invalid base ticket price. input is not a valid number.");
                }
                System.out.println();
            }
            // keep asking for base ticket price until valid
            System.out.print("\nbase ticket price (us dollars): ");
        }

        // ask for average rating
        System.out.print("average rating (out of 10): ");
        float averageRating;
        while (true) {
            // input the average rating as string
            String averageRatingInput = trimTrailingWhitespace(scanner.nextLine());
            // error handling if number contains letters or is negative
            if (!averageRatingInput.matches("^\\d+(\\.\\d+)?$")) {
                System.out.println("non absolute cinema. invalid average rating. only nonnegative numbers are allowed.");
            }
            else {
                // error handling if average rating is not a number
                try {
                    averageRating = Float.parseFloat(averageRatingInput);
                    if (averageRating > 10) {
                        System.out.println("non absolute cinema. invalid average rating. the maximum rating is 10.");
                    }
                    else {
                        break;
                    }
                }
                catch (NumberFormatException exception) {
                    System.out.println("non absolute cinema. invalid average rating. input is not a valid number.");
                }
            }
            // keep asking for average rating until valid
            System.out.print("\naverage rating (out of 10): ");
        }

        // ask for screen format
        System.out.print("screen format: ");
        String screenFormat = scanner.nextLine();

        // ask for price surcharge
        System.out.print("price surcharge: ");
        int priceSurcharge;
        while (true) {
            // input the price surcharge as string
            String priceSurchargeInput = trimTrailingWhitespace(scanner.nextLine());
            // error handling if number contains letters or is decimal
            if (!priceSurchargeInput.matches("^\\d+$")) {
                System.out.println("non absolute cinema. invalid price surcharge. only nonnegative integer numbers are allowed.");
            }
            else {
                // error handling if price surcharge is not a number
                try {
                    priceSurcharge = Integer.parseInt(priceSurchargeInput);
                    break;
                }
                catch (NumberFormatException exception) {
                    System.out.println("non absolute cinema. invalid price surcharge. input is not a valid number.");
                }
            }
            // keep asking for price surcharge until valid
            System.out.print("\nprice surcharge: ");
        }

        // ask for 3D glasses requirement
        System.out.print("requires 3D glasses (true/false): ");
        boolean requires3DGlasses;
        while (true) {
            // input the 3D glasses requirement as string
            String requires3DGlassesInput = scanner.nextLine();
            // error handling if value is not true or false
            if (requires3DGlassesInput.equals("true")) {
                requires3DGlasses = true;
                break;
            }
            else if (requires3DGlassesInput.equals("false")) {
                requires3DGlasses = false;
                break;
            }
            System.out.println("non absolute cinema. invalid value. please enter true or false.");
            System.out.print("\nrequires 3D glasses (true/false): ");
        }

        // instantiate a new CinemaFilm object from user input
        PremiumFormatCinemaFilm newFilm = new PremiumFormatCinemaFilm(code, title, genre, duration, averageRating,
                                                                        distributor, ageRating, baseTicketPrice,
                                                                        screenFormat, priceSurcharge, requires3DGlasses);
        // add it to the list
        filmList.add(newFilm);
        // print success message
        System.out.println("absolute cinema. new film has been added. ☑\n");
    }

    private static String trimTrailingWhitespace(String value) {
        return value.replaceFirst("\\s+$", "");
    }
}