#include <string>
#include "CinemaFilm.cpp"

using namespace std;

// class to represent a pre-release film inheriting from CinemaFilm class
class PreReleaseFilm : public CinemaFilm {

// private attributes
private:
	string releaseDate;
	string preSaleStartDate;
	int preSaleQuota;

public:
	// empty constructor
	PreReleaseFilm() {
	}

	// constructor with parameters
	PreReleaseFilm(string releaseDate, string preSaleStartDate, int preSaleQuota) {
		this->releaseDate = releaseDate;
		this->preSaleStartDate = preSaleStartDate;
		this->preSaleQuota = preSaleQuota;
	}

	// releaseDate getter and setter
	string getReleaseDate() {
		return releaseDate;
	}

	void setReleaseDate(string releaseDate) {
		this->releaseDate = releaseDate;
	}

	// preSaleStartDate getter and setter
	string getPreSaleStartDate() {
		return preSaleStartDate;
	}

	void setPreSaleStartDate(string preSaleStartDate) {
		this->preSaleStartDate = preSaleStartDate;
	}

	// preSaleQuota getter and setter
	int getPreSaleQuota() {
		return preSaleQuota;
	}

	void setPreSaleQuota(int preSaleQuota) {
		this->preSaleQuota = preSaleQuota;
	}

};
