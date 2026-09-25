from CinemaFilm import CinemaFilm

# class to represent a premium format cinema film inheriting from CinemaFilm class
class PremiumFormatCinemaFilm(CinemaFilm):
    # constructor
    def __init__(self, filmCode, title, genre, duration,
                averageRating, distributor, ageRating,
                baseTicketPrice, screenFormat, priceSurcharge,
                requires3DGlasses):
        super().__init__(filmCode, title, genre, duration, averageRating,distributor, ageRating, baseTicketPrice)
        self.screenFormat = screenFormat
        self.priceSurcharge = priceSurcharge
        self.requires3DGlasses = requires3DGlasses

    # screenFormat getter and setter
    def getScreenFormat(self):
        return self.screenFormat

    def setScreenFormat(self, screenFormat):
        self.screenFormat = screenFormat

    # priceSurcharge getter and setter
    def getPriceSurcharge(self):
        return self.priceSurcharge

    def setPriceSurcharge(self, priceSurcharge):
        self.priceSurcharge = priceSurcharge

    # requires3DGlasses getter and setter
    def getRequires3DGlasses(self):
        return self.requires3DGlasses

    def setRequires3DGlasses(self, requires3DGlasses):
        self.requires3DGlasses = requires3DGlasses

    # destructor
    def __del__(self):
        pass