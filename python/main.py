import re
import sys

from PremiumFormatCinemaFilm import PremiumFormatCinemaFilm

def main():
    # an array of absolute cinema film genres
    genres = [
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
    ]

    # a dynamic array to store absolute premium cinema films
    premiumFormatCinemaFilms = [
        PremiumFormatCinemaFilm("PCF001", "The Odyssey", "fantasy", 172, 8.4, "Universal Pictures", "R", 41, "IMAX 70mm", 27, False),
        PremiumFormatCinemaFilm("PCF002", "Resident Evil", "horror", 94, 7.7, "Sony Pictures Releasing", "R", 19, "ScreenX", 10, False),
        PremiumFormatCinemaFilm("PCF003", "Spider-Man: Brand New Day", "action", 144, 8.0, "Sony Pictures Releasing", "PG-13", 19, "4DX", 12, True),
        PremiumFormatCinemaFilm("PCF004", "Practical Magic 2", "romance", 130, 6.3, "Warner Bros. Pictures", "PG-13", 19, "4DX", 5, True),
        PremiumFormatCinemaFilm("PCF005", "Heart of the Beast", "thriller", 101, 7.2, "Paramount Pictures", "PG-13", 22, "Dolby Atmos", 4, False)
    ]

    # print welcome message and menu
    print("====================================================\n")
    print("       ( )                 (_ )        ( )_        ")
    print("   _ _ | |_     ___    _    | |  _   _ | ,_)   __  ")
    print(" /'_` )| '_`\\ /',__) /'_`\\  | | ( ) ( )| |   /'__`\\")
    print("( (_| || |_) )\\__, \\( (_) ) | | | (_) || |_ (  ___/")
    print("`\\__,_)(_,__/'(____/`\\___/'(___)`\\___/'`\\__)")
    print("                               _                   ")
    print(" _ _    _ __   __    ___ ___  (_) _   _   ___ ___  ")
    print("( '_`\\ ( '__)/'__`\\/' _ ` _ `\\| |( ) ( )/' _ ` _ `\\")
    print("| (_) )| |  (  ___/| ( ) ( ) || || (_) || ( ) ( ) |")
    print("| ,__/'(_)  `\\____)(_) (_) (_)(_)`\\___/'(_) (_) (_)`")
    print("| |                                                ")
    print("(_)___ (_)  ___     __    ___ ___     _ _          ")
    print(" /'___)| |/' _ `\\ /'__`\\/' _ ` _ `\\ /'_` )         ")
    print("( (___ | || ( ) |(  ___/| ( ) ( ) |( (_| | _       ")
    print("`\\____)(_)(_) (_)`\\____)(_) (_) (_)`\\__,_)(_)      (python edition.)")
    print("\n====================================================")
    print(" __   __                         __   __ ")
    print("/  ` /  \\  |\\/|  |\\/|  /\\  |\\ | |  \\ /__`")
    print("\\__, \\__/  |  |  |  | /~~\\ | \\| |__/ .__/\n")
    print("1. /add (ADD NEW ABSOLUTE CINEMA FILM)")
    print("2. /display (DISPLAY ALL ABSOLUTE CINEMA FILM)")
    print("3. /exit (EXIT)")
    print("\nenter your command: ")

    # loop to continuously accept user commands
    while True:
        print(">> ", end="")
        # get the command from input
        command = input()

        # call the respective method based on the function
        if command == "/add":
            addFilm(premiumFormatCinemaFilms, genres)
        elif command == "/display":
            displayFilms(premiumFormatCinemaFilms)
        elif command == "/exit":
            print("                          _  _                      ")
            print("                         ( )( )                     ")
            print("   __     _      _      _| || |_    _   _    __     ")
            print(" /'_ `\\ /'_`\\  /'_`\\  /'_` || '_`\\ ( ) ( ) /'__`\\")
            print("( (_) |( (_) )( (_) )( (_| || |_) )| (_) |(  ___/ _ ")
            print("`\\__  |`\\___/'`\\___/'`\\__,_)(_,__/'`\\__, |`\\____)(_)" )
            print("( )_) |                            ( )_| |          ")
            print(" \\___/'                            `\\___/'          ")
            sys.exit(0)
        else:
            print("\ninvalid command.\n")


    return 0


# function to calculate the width of every table column
def calculateColumnWidths(rows):
    # create one width entry for each table column
    columnWidths = [0] * len(rows[0])  # initialize every column width to zero

    # check every value in every row
    for row in rows:  # visit every table row
        # inspect each cell in the current row
        for column, value in enumerate(row):  # visit every cell in the row
            # keep the widest value found for this column
            columnWidths[column] = max(columnWidths[column], len(value))  # keep the largest cell width

    # return the calculated column widths
    return columnWidths


# function to print the table border
def printTableBorder(columnWidths):
    # print the left border
    print("※", end="")

    # reserve two spaces around each cell's content
    for width in columnWidths:  # draw one section for each column
        # draw the horizontal border for the current column
        print("-" * (width + 2) + "※", end="")  # draw the horizontal border for this column

    # move to the next line
    print()


# function to print the table header
def printTableHeader(columnWidths):
    # define the headers shown above the film data
    headers = [
        "No.", "Title", "Code", "Genre", "Duration", "Rating", "Distributor", "Age Rating", "Ticket Price", "Screen Format", "Price Surcharge", "3D Glasses"  # list each header label
    ]

    # print the header row
    printTableRow(headers, columnWidths)


# function to print one table row
def printTableRow(row, columnWidths):
    # print the left border
    print("⋮", end="")

    # print every value with its calculated width
    for column, value in enumerate(row):
        # print one space before the value and one space after its padded width
        print(" " + value.ljust(columnWidths[column] + 1) + "⋮", end="")

    # move to the next line
    print()


# function to display all films
def displayFilms(filmList):
    # error handling if the film list is empty
    if not filmList:
        print("non absolute cinema. no film.")
        return

    # store the table header and film rows
    rows = [
        ["No.", "Title", "Code", "Genre", "Duration", "Rating", "Distributor", "Age Rating", "Ticket Price", "Screen Format", "Price Surcharge", "3D Glasses"]  # add the header row
    ]
    # number the films starting from one
    filmNumber = 1

    # convert every film into a table row
    for film in filmList:
        # convert the numeric rating to text
        averageRating = f"{film.getAverageRating():g}"

        # add the film's display values to the table rows
        rows.append([  # append the film as a display row
            str(filmNumber),  # add the film number
            film.getTitle(),  # add the film title
            film.getFilmCode(),  # add the film code
            film.getGenre(),  # add the film genre
            str(film.getDuration()) + " minutes",  # add the film duration
            averageRating + "/10",  # add the average rating
            film.getDistributor(),  # add the distributor
            film.getAgeRating(),  # add the age rating
            "$" + str(film.getBaseTicketPrice()),  # add the base ticket price
            film.getScreenFormat(),  # add the screen format
            "$" + str(film.getPriceSurcharge()),  # add the price surcharge
            "true" if film.getRequires3DGlasses() else "false"  # add the 3D glasses requirement
        ])
        filmNumber += 1

    # calculate widths from headers and film data
    columnWidths = calculateColumnWidths(rows)

    # print the table title
    print("\nabsolute cinema. list of films:")

    # print the table header and rows
    printTableBorder(columnWidths)
    printTableHeader(columnWidths)
    printTableBorder(columnWidths)
    # print each film row below the headings
    for row in rows[1:]:
        printTableRow(row, columnWidths)
    # draw the bottom border
    printTableBorder(columnWidths)

    # print total films
    print(f"total absolute cinema films: {len(filmList)}\n")


# function to add new film
def addFilm(filmList, genres):
    # ask user for film code
    print("\ncode: ", end="")
    # read film code
    code = input()
    # error handling for film code format
    while True:
        if not re.fullmatch(r"PCF\d{3}", code):
            print("non absolute cinema. invalid code. format must be PCF000.")
        else:
            # error handling if film code already exists
            codeExists = False
            for film in filmList:
                if film.getFilmCode() == code:
                    codeExists = True
                    break

            if not codeExists:
                break

            print("non absolute cinema. film code already exists. please enter a different code.")

        print("code: ", end="")
        code = input()

    # ask and read film title
    print("title: ", end="")
    title = input()

    # ask and read film genre
    print("genre: ", end="")
    genre = input()
    # error handling for film genre if the genre is not in the list
    while genre not in genres:
        print("non absolute cinema. invalid genre. please enter a valid genre from this list: [", end="")
        print(", ".join(genres), end="")
        print("]\n")
        print("genre: ", end="")
        genre = input()

    # ask and read film distributor
    print("distributor: ", end="")
    distributor = input()

    # ask and read age rating
    print("age rating: ", end="")
    ageRating = input()

    # ask for duration
    print("duration (minutes): ", end="")
    while True:
        # input the duration as string
        durationInput = input().rstrip()
        # error handling if number contains letters or is decimal
        if not re.fullmatch(r"\d+", durationInput):
            print("non absolute cinema. invalid duration. only nonnegative integer numbers are allowed.")
        else:
            # error handling if duration is not a number
            try:
                duration = int(durationInput)
                # error handling if duration is more than 873 minutes
                if duration > 873:
                    print("non absolute cinema. even the longest cinema film in history is only 873 minutes long. please enter a valid duration.", end="")
                else:
                    break
            except ValueError:
                print("non absolute cinema. invalid duration. input is not a valid number.", end="")
            print()
        # keep asking for duration until valid
        print("\nduration (minutes): ", end="")

    # ask for base ticket price
    print("base ticket price (us dollars): ", end="")
    while True:
        # input the base ticket price as string
        baseTicketPriceInput = input().rstrip()
        # error handling if number contains letters or is decimal
        if not re.fullmatch(r"\d+", baseTicketPriceInput):
            print("non absolute cinema. invalid base ticket price. only nonnegative integer numbers are allowed.")
        else:
            # error handling if base ticket price is not a number
            try:
                baseTicketPrice = int(baseTicketPriceInput)
                # error handling if base ticket price is more than 500 dollars
                if baseTicketPrice > 500:
                    print("non absolute cinema. invalid base ticket price. the maximum ticket price is 500 dollars.", end="")
                else:
                    break
            except ValueError:
                print("non absolute cinema. invalid base ticket price. input is not a valid number.", end="")
            print()
        # keep asking for base ticket price until valid
        print("\nbase ticket price (us dollars): ", end="")

    # ask for average rating
    print("average rating (out of 10): ", end="")
    while True:
        # input the average rating as string
        averageRatingInput = input().rstrip()
        # error handling if number contains letters or is negative
        if not re.fullmatch(r"\d+(\.\d+)?", averageRatingInput):
            print("non absolute cinema. invalid average rating. only nonnegative numbers are allowed.")
        else:
            # error handling if average rating is not a number
            try:
                averageRating = float(averageRatingInput)
                if averageRating > 10:
                    print("non absolute cinema. invalid average rating. the maximum rating is 10.")
                else:
                    break
            except ValueError:
                print("non absolute cinema. invalid average rating. input is not a valid number.")
        # keep asking for average rating until valid
        print("\naverage rating (out of 10): ", end="")

    # ask for screen format
    print("screen format: ", end="")
    screenFormat = input()

    # ask for price surcharge
    print("price surcharge: ", end="")
    while True:
        # input the price surcharge as string
        priceSurchargeInput = input().rstrip()
        # error handling if number contains letters or is decimal
        if not re.fullmatch(r"\d+", priceSurchargeInput):
            print("non absolute cinema. invalid price surcharge. only nonnegative integer numbers are allowed.")
        else:
            # error handling if price surcharge is not a number
            try:
                priceSurcharge = int(priceSurchargeInput)
                break
            except ValueError:
                print("non absolute cinema. invalid price surcharge. input is not a valid number.")
        # keep asking for price surcharge until valid
        print("\nprice surcharge: ", end="")

    # ask for 3D glasses requirement
    print("requires 3D glasses (true/false): ", end="")
    while True:
        # input the 3D glasses requirement as string
        requires3DGlassesInput = input()
        # error handling if value is not true or false
        if requires3DGlassesInput == "true":
            requires3DGlasses = True
            break
        elif requires3DGlassesInput == "false":
            requires3DGlasses = False
            break
        print("non absolute cinema. invalid value. please enter true or false.")
        print("\nrequires 3D glasses (true/false): ", end="")

    # instantiate a new CinemaFilm object from user input
    newFilm = PremiumFormatCinemaFilm(code, title, genre, duration, averageRating,
                                        distributor, ageRating, baseTicketPrice,
                                        screenFormat, priceSurcharge, requires3DGlasses)
    # add it to the list
    filmList.append(newFilm)
    # print success message
    print("absolute cinema. new film has been added.\n")


if __name__ == "__main__":
    main()