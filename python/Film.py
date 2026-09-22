# class to represent a film
class Film:
    # constructor with parameters
    def __init__(self, filmCode, title, genre, duration, averageRating):
        self.filmCode = filmCode
        self.title = title
        self.genre = genre
        self.duration = duration
        self.averageRating = averageRating

    # filmCode getter and setter
    def getFilmCode(self):
        return self.filmCode

    def setFilmCode(self, filmCode):
        self.filmCode = filmCode

    # title getter and setter
    def getTitle(self):
        return self.title

    def setTitle(self, title):
        self.title = title

    # genre getter and setter
    def getGenre(self):
        return self.genre

    def setGenre(self, genre):
        self.genre = genre

    # duration getter and setter
    def getDuration(self):
        return self.duration

    def setDuration(self, duration):
        self.duration = duration

    # averageRating getter and setter
    def getAverageRating(self):
        return self.averageRating

    def setAverageRating(self, averageRating):
        self.averageRating = averageRating
