#include <iostream>
#include <string>
#include <vector>
#include <regex>
#include <algorithm>
#include <stdexcept>
#include <iomanip>
#include <sstream>
#include "PremiumFormatCinemaFilm.cpp"

using namespace std;

// function declarations
void displayFilms(vector<PremiumFormatCinemaFilm>& filmList);
void addFilm(vector<PremiumFormatCinemaFilm>& filmList, const vector<string>& genres);
vector<size_t> calculateColumnWidths(const vector<vector<string>>& rows);
void printTableBorder(const vector<size_t>& columnWidths);
void printTableHeader(const vector<size_t>& columnWidths);
void printTableRow(const vector<string>& row, const vector<size_t>& columnWidths);

int main() {
    // an array of absolute cinema film genres
    const vector<string> genres = {
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
    };

    // a dynamic array to store absolute premium cinema films
    vector<PremiumFormatCinemaFilm> premiumFormatCinemaFilms = {
        PremiumFormatCinemaFilm("PCF001", "The Odyssey", "fantasy", 172, 8.4f, "Universal Pictures", "R", 41, "IMAX 70mm", 27, false),
        PremiumFormatCinemaFilm("PCF002", "Resident Evil", "horror", 94, 7.7f, "Sony Pictures Releasing", "R", 19, "ScreenX", 10, false),
        PremiumFormatCinemaFilm("PCF003", "Spider-Man: Brand New Day", "action", 144, 8.0f, "Sony Pictures Releasing", "PG-13", 19, "4DX", 12, true),
        PremiumFormatCinemaFilm("PCF004", "Practical Magic 2", "romance", 130, 6.3f, "Warner Bros. Pictures", "PG-13", 19, "4DX", 5, true),
        PremiumFormatCinemaFilm("PCF005", "Heart of the Beast", "thriller", 101, 7.2f, "Paramount Pictures", "PG-13", 22, "Dolby Atmos", 4, false)
    };
    
    // print welcome message and menu
    cout << "====================================================\n\n";
    
    cout << "       ( )                 (_ )        ( )_        " << '\n';
    cout << "   _ _ | |_     ___    _    | |  _   _ | ,_)   __  " << '\n';
    cout << " /'_` )| '_`\\ /',__) /'_`\\  | | ( ) ( )| |   /'__`\\" << '\n';
    cout << "( (_| || |_) )\\__, \\( (_) ) | | | (_) || |_ (  ___/" << '\n';
    cout << "`\\__,_)(_,__/'(____/`\\___/'(___)`\\___/'`\\__)`\\____)" << '\n';
    cout << "                               _                   " << '\n';
    cout << " _ _    _ __   __    ___ ___  (_) _   _   ___ ___  " << '\n';
    cout << "( '_`\\ ( '__)/'__`\\/' _ ` _ `\\| |( ) ( )/' _ ` _ `\\" << '\n';
    cout << "| (_) )| |  (  ___/| ( ) ( ) || || (_) || ( ) ( ) |" << '\n';
    cout << "| ,__/'(_)  `\\____)(_) (_) (_)(_)`\\___/'(_) (_) (_)`" << '\n';
    cout << "| |                                                " << '\n';
    cout << "(_)___ (_)  ___     __    ___ ___     _ _          " << '\n';
    cout << " /'___)| |/' _ `\\ /'__`\\/' _ ` _ `\\ /'_` )         " << '\n';
    cout << "( (___ | || ( ) |(  ___/| ( ) ( ) |( (_| | _       " << '\n';
    cout << "`\\____)(_)(_) (_)`\\____)(_) (_) (_)`\\__,_)(_)      (c++ edition.)" << '\n';

    cout << "\n====================================================" << '\n';

    cout << " __   __                         __   __ " << '\n';
    cout << "/  ` /  \\  |\\/|  |\\/|  /\\  |\\ | |  \\ /__`" << '\n';
    cout << "\\__, \\__/  |  |  |  | /~~\\ | \\| |__/ .__/\n\n";

    cout << "1. /add (ADD NEW ABSOLUTE CINEMA FILM)" << '\n';
    cout << "2. /display (DISPLAY ALL ABSOLUTE CINEMA FILM)" << '\n';
    cout << "7. /exit (EXIT)" << '\n';

    cout << "\nenter your command: " << '\n';

    // loop to continuously accept user commands
    while (true) {
        cout << ">> ";
        // get the command from input
        string command;
        getline(cin, command);

        // call the respective method based on the function
        if (command == "/add") {
            addFilm(premiumFormatCinemaFilms, genres);
        } 
        else if (command == "/display") {
            displayFilms(premiumFormatCinemaFilms);
        } 
        else if (command == "/exit") {
            cout << "                          _  _                      " << '\n';
            cout << "                         ( )( )                     " << '\n';
            cout << "   __     _      _      _| || |_    _   _    __     " << '\n';
            cout << " /'_ `\\ /'_`\\  /'_`\\  /'_` || '_`\\ ( ) ( ) /'__`\\" << '\n';
            cout << "( (_) |( (_) )( (_) )( (_| || |_) )| (_) |(  ___/ _ " << '\n';
            cout << "`\\__  |`\\___/'`\\___/'`\\__,_)(_,__/'`\\__, |`\\____)(_)" << '\n';
            cout << "( )_) |                            ( )_| |          " << '\n';
            cout << " \\___/'                            `\\___/'          " << '\n';
            exit(0);
        } 
        else {
            cout << "\ninvalid command.\n";
        }
    }


    return 0;
}

// function to calculate the width of every table column
vector<size_t> calculateColumnWidths(const vector<vector<string>>& rows) {
    // create one width entry for each table column
    vector<size_t> columnWidths(rows.front().size(), 0); // initialize every column width to zero

    // check every value in every row
    for (const vector<string>& row : rows) { // visit every table row
        // inspect each cell in the current row
        for (size_t column = 0; column < row.size(); ++column) { // visit every cell in the row
            // keep the widest value found for this column
            columnWidths[column] = max(columnWidths[column], row[column].length()); // keep the largest cell width
        }
    }

    // return the calculated column widths
    return columnWidths;
}

// function to print the table border
void printTableBorder(const vector<size_t>& columnWidths) {
    // print the left border
    cout << "※";

    // reserve two spaces around each cell's content
    for (size_t width : columnWidths) { // draw one section for each column
        // draw the horizontal border for the current column
        cout << string(width + 2, '-') << "※"; // draw the horizontal border for this column
    }

    // move to the next line
    cout << '\n';
}

// function to print the table header
void printTableHeader(const vector<size_t>& columnWidths) {
    // define the headers shown above the film data
    const vector<string> headers = {
        "No.", "Title", "Code", "Genre", "Duration", "Rating", "Distributor", "Age Rating", "Ticket Price", "Screen Format", "Price Surcharge", "3D Glasses" // list each header label
    };

    // print the header row
    printTableRow(headers, columnWidths);
}

// function to print one table row
void printTableRow(const vector<string>& row, const vector<size_t>& columnWidths) {
    // print the left border
    cout << "⋮";

    // print every value with its calculated width
    for (size_t column = 0; column < row.size(); ++column) {
        // print one space before the value and one space after its padded width
        cout << ' ' << left << setw(static_cast<int>(columnWidths[column] + 1)) << row[column] << "⋮" ;
    }

    // move to the next line
    cout << '\n';
}

// function to display all films
void displayFilms(vector<PremiumFormatCinemaFilm>& filmList) {
    // error handling if the film list is empty
    if (filmList.empty()) {
        cout << "non absolute cinema. no film.\n\n";
        return;
    }

    // store the table header and film rows
    vector<vector<string>> rows = {
        {"No.", "Title", "Code", "Genre", "Duration", "Rating", "Distributor", "Age Rating", "Ticket Price", "Screen Format", "Price Surcharge", "3D Glasses"} // add the header row
    };
    // number the films starting from one
    int filmNumber = 1;

    // convert every film into a table row
    for (PremiumFormatCinemaFilm& film : filmList) {
        // convert the numeric rating to text
        ostringstream averageRating;
        // write the film rating into the string stream
        averageRating << film.getAverageRating();

        // add the film's display values to the table rows
        rows.push_back({ // append the film as a display row
            to_string(filmNumber++), // add the film number
            film.getTitle(), // add the film title
            film.getFilmCode(), // add the film code
            film.getGenre(), // add the film genre
            to_string(film.getDuration()) + " minutes", // add the film duration
            averageRating.str() + "/10", // add the average rating
            film.getDistributor(), // add the distributor
            film.getAgeRating(), // add the age rating
            "$" + to_string(film.getBaseTicketPrice()), // add the base ticket price
            film.getScreenFormat(), // add the screen format
            "$" + to_string(film.getPriceSurcharge()), // add the price surcharge
            film.getRequires3DGlasses() ? "true" : "false" // add the 3D glasses requirement
        });
    }

    // calculate widths from headers and film data
    const vector<size_t> columnWidths = calculateColumnWidths(rows);

    // print the table title
    cout << "\nabsolute cinema. list of films:\n";

    // print the table header and rows
    printTableBorder(columnWidths);
    printTableHeader(columnWidths);
    printTableBorder(columnWidths);
    // print each film row below the headings
    for (size_t row = 1; row < rows.size(); ++row) {
        printTableRow(rows[row], columnWidths);
    }
    // draw the bottom border
    printTableBorder(columnWidths);

    // print total films
    cout << "total absolute cinema films: " << filmList.size() << "\n\n";
}

// function to add new film
void addFilm(vector<PremiumFormatCinemaFilm>& filmList, const vector<string>& genres) {
    // ask user for film code
    cout << "\ncode: ";
    // read film code
    string code;
    getline(cin, code);
    // error handling for film code format
    while (true) {
        if (!regex_match(code, regex("^PCF\\d{3}$"))) {
            cout << "non absolute cinema. invalid code. format must be PCF000.\n\n";
        }
        else {
            // error handling if film code already exists
            bool codeExists = false;
            for (PremiumFormatCinemaFilm& film : filmList) {
                if (film.getFilmCode() == code) {
                    codeExists = true;
                    break;
                }
            }

            if (!codeExists) {
                break;
            }

            cout << "non absolute cinema. film code already exists. please enter a different code.\n\n";
        }

        cout << "code: ";
        getline(cin, code);
    }

    // ask and read film title
    cout << "title: ";
    string title;
    getline(cin, title);

    // ask and read film genre
    cout << "genre: ";
    string genre;
    getline(cin, genre);
    // error handling for film genre if the genre is not in the list
    while (find(genres.begin(), genres.end(), genre) == genres.end()) {
        cout << "non absolute cinema. invalid genre. please enter a valid genre from this list: [";
        for (size_t i = 0; i < genres.size(); ++i) {
            if (i > 0) {
                cout << ", ";
            }
            cout << genres[i];
        }
        cout << "]\n\n";
        cout << "genre: ";
        getline(cin, genre);
    }

    // ask and read film distributor
    cout << "distributor: ";
    string distributor;
    getline(cin, distributor);

    // ask and read age rating
    cout << "age rating: ";
    string ageRating;
    getline(cin, ageRating);

    // ask for duration
    cout << "duration (minutes): ";
    int duration;
    while (true) {
        // input the duration as string
        string durationInput;
        getline(cin, durationInput);
        durationInput = durationInput.substr(0, durationInput.find_last_not_of(" \t\r\n") + 1);
        // error handling if number contains letters or is decimal
        if (!regex_match(durationInput, regex("^\\d+$"))) {
            cout << "non absolute cinema. invalid duration. only nonnegative integer numbers are allowed.\n";
        }
        else {
            // error handling if duration is not a number
            try {
                duration = stoi(durationInput);
                // error handling if duration is more than 873 minutes
                if (duration > 873) {
                    cout << "non absolute cinema. even the longest cinema film in history is only 873 minutes long. please enter a valid duration.";
                }
                else {
                    break;
                }
            }
            catch (const invalid_argument&) {
                cout << "non absolute cinema. invalid duration. input is not a valid number.";
            }
            catch (const out_of_range&) {
                cout << "non absolute cinema. invalid duration. input is not a valid number.";
            }
            cout << '\n';
        }
        // keep asking for duration until valid
        cout << "\nduration (minutes): ";
    }

    // ask for base ticket price
    cout << "base ticket price (us dollars): ";
    int baseTicketPrice;
    while (true) {
        // input the base ticket price as string
        string baseTicketPriceInput;
        getline(cin, baseTicketPriceInput);
        baseTicketPriceInput = baseTicketPriceInput.substr(0, baseTicketPriceInput.find_last_not_of(" \t\r\n") + 1);
        // error handling if number contains letters or is decimal
        if (!regex_match(baseTicketPriceInput, regex("^\\d+$"))) {
            cout << "non absolute cinema. invalid base ticket price. only nonnegative integer numbers are allowed.\n";
        }
        else {
            // error handling if base ticket price is not a number
            try {
                baseTicketPrice = stoi(baseTicketPriceInput);
                // error handling if base ticket price is more than 500 dollars
                if (baseTicketPrice > 500) {
                    cout << "non absolute cinema. invalid base ticket price. the maximum ticket price is 500 dollars.";
                }
                else {
                    break;
                }
            }
            catch (const invalid_argument&) {
                cout << "non absolute cinema. invalid base ticket price. input is not a valid number.";
            }
            catch (const out_of_range&) {
                cout << "non absolute cinema. invalid base ticket price. input is not a valid number.";
            }
            cout << '\n';
        }
        // keep asking for base ticket price until valid
        cout << "\nbase ticket price (us dollars): ";
    }

    // ask for average rating
    cout << "average rating (out of 10): ";
    float averageRating;
    while (true) {
        // input the average rating as string
        string averageRatingInput;
        getline(cin, averageRatingInput);
        averageRatingInput = averageRatingInput.substr(0, averageRatingInput.find_last_not_of(" \t\r\n") + 1);
        // error handling if number contains letters or is negative
        if (!regex_match(averageRatingInput, regex("^\\d+(\\.\\d+)?$"))) {
            cout << "non absolute cinema. invalid average rating. only nonnegative numbers are allowed.\n";
        }
        else {
            // error handling if average rating is not a number
            try {
                averageRating = stof(averageRatingInput);
                if (averageRating > 10) {
                    cout << "non absolute cinema. invalid average rating. the maximum rating is 10.\n";
                }
                else {
                    break;
                }
            }
            catch (const invalid_argument&) {
                cout << "non absolute cinema. invalid average rating. input is not a valid number.\n";
            }
            catch (const out_of_range&) {
                cout << "non absolute cinema. invalid average rating. input is not a valid number.\n";
            }
        }
        // keep asking for average rating until valid
        cout << "\naverage rating (out of 10): ";
    }

    // ask for screen format
    cout << "screen format: ";
    string screenFormat;
    getline(cin, screenFormat);

    // ask for price surcharge
    cout << "price surcharge: ";
    int priceSurcharge;
    while (true) {
        // input the price surcharge as string
        string priceSurchargeInput;
        getline(cin, priceSurchargeInput);
        priceSurchargeInput = priceSurchargeInput.substr(0, priceSurchargeInput.find_last_not_of(" \t\r\n") + 1);
        // error handling if number contains letters or is decimal
        if (!regex_match(priceSurchargeInput, regex("^\\d+$"))) {
            cout << "non absolute cinema. invalid price surcharge. only nonnegative integer numbers are allowed.\n";
        }
        else {
            // error handling if price surcharge is not a number
            try {
                priceSurcharge = stoi(priceSurchargeInput);
                break;
            }
            catch (const invalid_argument&) {
                cout << "non absolute cinema. invalid price surcharge. input is not a valid number.\n";
            }
            catch (const out_of_range&) {
                cout << "non absolute cinema. invalid price surcharge. input is not a valid number.\n";
            }
        }
        // keep asking for price surcharge until valid
        cout << "\nprice surcharge: ";
    }

    // ask for 3D glasses requirement
    cout << "requires 3D glasses (true/false): ";
    bool requires3DGlasses;
    while (true) {
        // input the 3D glasses requirement as string
        string requires3DGlassesInput;
        getline(cin, requires3DGlassesInput);
        // error handling if value is not true or false
        if (requires3DGlassesInput == "true") {
            requires3DGlasses = true;
            break;
        }
        else if (requires3DGlassesInput == "false") {
            requires3DGlasses = false;
            break;
        }
        cout << "non absolute cinema. invalid value. please enter true or false.\n";
        cout << "\nrequires 3D glasses (true/false): ";
    }

    // instantiate a new CinemaFilm object from user input
    PremiumFormatCinemaFilm newFilm(code, title, genre, duration, averageRating,
                                    distributor, ageRating, baseTicketPrice,
                                    screenFormat, priceSurcharge, requires3DGlasses);
    // add it to the list
    filmList.push_back(newFilm);
    // print success message
    cout << "absolute cinema. new film has been added.\n\n";
}