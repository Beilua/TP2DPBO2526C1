#include <string>
#include "Film.cpp"

using namespace std;

// class to represent a cinema film inheriting from Film class
class CinemaFilm : public Film {

// private attributes
private:
	string studioNumber;
	string screenFormat;
	int ticketPrice;

public:
	// empty constructor
	CinemaFilm() {
	}

	// constructor with parameters
	CinemaFilm(string studioNumber, string screenFormat, int ticketPrice) {
		this->studioNumber = studioNumber;
		this->screenFormat = screenFormat;
		this->ticketPrice = ticketPrice;
	}

	// studioNumber getter and setter
	string getStudioNumber() {
		return studioNumber;
	}

	void setStudioNumber(string studioNumber) {
		this->studioNumber = studioNumber;
	}

	// screenFormat getter and setter
	string getScreenFormat() {
		return screenFormat;
	}

	void setScreenFormat(string screenFormat) {
		this->screenFormat = screenFormat;
	}

	// ticketPrice getter and setter
	int getTicketPrice() {
		return ticketPrice;
	}

	void setTicketPrice(int ticketPrice) {
		this->ticketPrice = ticketPrice;
	}

};
