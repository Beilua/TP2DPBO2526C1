#include <string>
#include "CinemaFilm.cpp"

using namespace std;

// class to represent a premium format cinema film inheriting from CinemaFilm class
class PremiumFormatCinemaFilm : public CinemaFilm {

// private attributes
private:
    string screenFormat;
    int priceSurcharge;
    bool requires3DGlasses;

public:
    // empty constructor
    PremiumFormatCinemaFilm() {
    }

    // constructor with all attributes from both parent and child classes
    PremiumFormatCinemaFilm(string filmCode, string title, string genre, int duration,
                            float averageRating, string distributor, string ageRating,
                            int baseTicketPrice, string screenFormat, int priceSurcharge,
                            bool requires3DGlasses) {
        setFilmCode(filmCode);
        setTitle(title);
        setGenre(genre);
        setDuration(duration);
        setAverageRating(averageRating);
        setDistributor(distributor);
        setAgeRating(ageRating);
        setBaseTicketPrice(baseTicketPrice);
        this->screenFormat = screenFormat;
        this->priceSurcharge = priceSurcharge;
        this->requires3DGlasses = requires3DGlasses;
    }

    // screenFormat getter and setter
    string getScreenFormat() {
        return screenFormat;
    }

    void setScreenFormat(string screenFormat) {
        this->screenFormat = screenFormat;
    }


    // priceSurcharge getter and setter
    int getPriceSurcharge() {
        return priceSurcharge;
    }

    void setPriceSurcharge(int priceSurcharge) {
        this->priceSurcharge = priceSurcharge;
    }


    // requires3DGlasses getter and setter
    bool getRequires3DGlasses() {
        return requires3DGlasses;
    }

    void setRequires3DGlasses(bool requires3DGlasses) {
        this->requires3DGlasses = requires3DGlasses;
    }
};

