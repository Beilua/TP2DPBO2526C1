from Film import Film

# class to represent a cinema film inheriting from Film class
class CinemaFilm(Film):
    # private attributes
    def __init__(self, filmCode, title, genre, duration, averageRating, distributor, ageRating, baseTicketPrice):
        # empty constructor
        super().__init__(filmCode, title, genre, duration, averageRating)
        self.distributor = distributor
        self.ageRating = ageRating
        self.baseTicketPrice = baseTicketPrice

    # distributor getter and setter
    def getDistributor(self):
        return self.distributor

    def setDistributor(self, distributor):
        self.distributor = distributor

    # ageRating getter and setter
    def getAgeRating(self):
        return self.ageRating

    def setAgeRating(self, ageRating):
        self.ageRating = ageRating

    # baseTicketPrice getter and setter
    def getBaseTicketPrice(self):
        return self.baseTicketPrice

    def setBaseTicketPrice(self, baseTicketPrice):
        self.baseTicketPrice = baseTicketPrice

    # destructor
    def __del__(self):
        pass