from Film import Film


# class to represent a cinema film inheriting from Film class
class CinemaFilm(Film):
    # constructor with parameters
    def __init__(self, studioNumber, screenFormat, ticketPrice):
        super().__init__()
        self.studioNumber = studioNumber
        self.screenFormat = screenFormat
        self.ticketPrice = ticketPrice

    # studioNumber getter and setter
    def getStudioNumber(self):
        return self.studioNumber

    def setStudioNumber(self, studioNumber):
        self.studioNumber = studioNumber

    # screenFormat getter and setter
    def getScreenFormat(self):
        return self.screenFormat

    def setScreenFormat(self, screenFormat):
        self.screenFormat = screenFormat

    # ticketPrice getter and setter
    def getTicketPrice(self):
        return self.ticketPrice

    def setTicketPrice(self, ticketPrice):
        self.ticketPrice = ticketPrice
