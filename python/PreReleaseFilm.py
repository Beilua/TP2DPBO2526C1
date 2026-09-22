from CinemaFilm import CinemaFilm


# class to represent a pre-release film inheriting from CinemaFilm class
class PreReleaseFilm(CinemaFilm):
    # constructor with parameters
    def __init__(self, releaseDate, preSaleStartDate, preSaleQuota):
        super().__init__()
        self.releaseDate = releaseDate
        self.preSaleStartDate = preSaleStartDate
        self.preSaleQuota = preSaleQuota

    # releaseDate getter and setter
    def getReleaseDate(self):
        return self.releaseDate

    def setReleaseDate(self, releaseDate):
        self.releaseDate = releaseDate

    # preSaleStartDate getter and setter
    def getPreSaleStartDate(self):
        return self.preSaleStartDate

    def setPreSaleStartDate(self, preSaleStartDate):
        self.preSaleStartDate = preSaleStartDate

    # preSaleQuota getter and setter
    def getPreSaleQuota(self):
        return self.preSaleQuota

    def setPreSaleQuota(self, preSaleQuota):
        self.preSaleQuota = preSaleQuota
