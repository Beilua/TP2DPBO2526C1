// class to represent a film
public class Film {
    // private attributes
    private String filmCode;
    private String title;
    private String genre;
    private int duration;
    private float averageRating;

    // empty constructor
    public Film() {
    }

    // constructor with parameters
    public Film(String filmCode, String title, String genre, int duration, float averageRating) {
        this.filmCode = filmCode;
        this.title = title;
        this.genre = genre;
        this.duration = duration;
        this.averageRating = averageRating;
    }

    // filmCode getter and setter
    public String getFilmCode() {
        return filmCode;
    }

    public void setFilmCode(String filmCode) {
        this.filmCode = filmCode;
    }

    // title getter and setter
    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    // genre getter and setter
    public String getGenre() {
        return genre;
    }

    public void setGenre(String genre) {
        this.genre = genre;
    }

    // duration getter and setter
    public int getDuration() {
        return duration;
    }

    public void setDuration(int duration) {
        this.duration = duration;
    }

    // averageRating getter and setter
    public float getAverageRating() {
        return averageRating;
    }

    public void setAverageRating(float averageRating) {
        this.averageRating = averageRating;
    }
}