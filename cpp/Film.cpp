#include <string>

using namespace std;

// class to represent a film
class Film {
    // private attributes
    private:
        string filmCode;
        string title;
        string genre;
        int duration;
        float averageRating;
    
    public:
        // empty constructor
        Film() {

        }

        // constructor with parameters
        Film(string filmCode, string title, string genre, int duration, float averageRating) {
            this->filmCode = filmCode;
            this->title = title;
            this->genre = genre;
            this->duration = duration;
            this->averageRating = averageRating;
        }

        // filmCode getter and setter
        string getFilmCode() {
            return filmCode;
        }

        void setFilmCode(string filmCode) {
            this->filmCode = filmCode;
        }


        // title getter and setter
        string getTitle() {
            return title;
        }

        void setTitle(string title) {
            this->title = title;
        }


        // genre getter and setter
        string getGenre() {
            return genre;
        }

        void setGenre(string genre) {
            this->genre = genre;
        }


        // duration getter and setter
        int getDuration() {
            return duration;
        }

        void setDuration(int duration) {
            this->duration = duration;
        }


        // averageRating getter and setter
        float getAverageRating() {
            return averageRating;
        }

        void setAverageRating(float averageRating) {
            this->averageRating = averageRating;
        }

        // destructor
        ~Film() {
        }
};