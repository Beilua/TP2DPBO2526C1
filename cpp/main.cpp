#include <iostream>
#include <string>
#include <vector>
#include "PremiumFormatCinemaFilm.cpp"

using namespace std;

int main() {
    vector<PremiumFormatCinemaFilm> preReleaseFilms = {
        PremiumFormatCinemaFilm("PCF001", "The Odyssey", "Fantasy", 172, 8.4f, "Universal Pictures", "R", 41, "IMAX 70mm", 27, false),
        PremiumFormatCinemaFilm("PCF002", "Resident Evil", "Horror", 94, 7.7f, "Sony Pictures Releasing", "R", 19, "ScreenX", 10, false),
        PremiumFormatCinemaFilm("PCF003", "Spider-Man: Brand New Day", "Action", 144, 8.0f, "Sony Pictures Releasing", "PG-13", 19, "4DX", 12, true),
        PremiumFormatCinemaFilm("PCF004", "Practical Magic 2", "Romance", 130, 6.3f, "Warner Bros. Pictures", "PG-13", 19, "4DX", 5, true),
        PremiumFormatCinemaFilm("PCF005", "Heart of the Beast", "Thriller", 101, 7.2f, "Paramount Pictures", "PG-13", 22, "Dolby Atmos", 4, false)
    };

    return 0;
}