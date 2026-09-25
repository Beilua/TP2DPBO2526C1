#include <string>
#include "Film.cpp"

using namespace std;

// class to represent a cinema film inheriting from Film class
class CinemaFilm : public Film {
	// private attributes
	private:
		string distributor;
		string ageRating;
		int baseTicketPrice;

	public:
		// empty constructor
		CinemaFilm() {
		}

		// constructor with only child class attributes
		CinemaFilm(string distributor, string ageRating, int baseTicketPrice) {
			this->distributor = distributor;
			this->ageRating = ageRating;
			this->baseTicketPrice = baseTicketPrice;
		}

		// constructor with all attributes from both parent and child classes
		CinemaFilm(string filmCode, string title, string genre, int duration,
					float averageRating, string distributor, string ageRating,
					int baseTicketPrice) {
			setFilmCode(filmCode);
			setTitle(title);
			setGenre(genre);
			setDuration(duration);
			setAverageRating(averageRating);
			this->distributor = distributor;
			this->ageRating = ageRating;
			this->baseTicketPrice = baseTicketPrice;
		}

		// distributor getter and setter
		string getDistributor() {
			return distributor;
		}

		void setDistributor(string distributor) {
			this->distributor = distributor;
		}


		// ageRating getter and setter
		string getAgeRating() {
			return ageRating;
		}

		void setAgeRating(string ageRating) {
			this->ageRating = ageRating;
		}


		// baseTicketPrice getter and setter
		int getBaseTicketPrice() {
			return baseTicketPrice;
		}

		void setBaseTicketPrice(int baseTicketPrice) {
			this->baseTicketPrice = baseTicketPrice;
		}

        // destructor
		~CinemaFilm() {
		}
};

