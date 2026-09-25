// class to represent a cinema film inheriting from Film class
public class CinemaFilm extends Film {
    // private attributes
    private String distributor;
    private String ageRating;
    private int baseTicketPrice;

    // empty constructor
    public CinemaFilm() {
    }

    // constructor with only child class attributes
    public CinemaFilm(String distributor, String ageRating, int baseTicketPrice) {
        this.distributor = distributor;
        this.ageRating = ageRating;
        this.baseTicketPrice = baseTicketPrice;
    }

    // constructor with all attributes from both parent and child classes
    public CinemaFilm(String filmCode, String title, String genre, int duration,
                        float averageRating, String distributor, String ageRating,
                        int baseTicketPrice) {
        setFilmCode(filmCode);
        setTitle(title);
        setGenre(genre);
        setDuration(duration);
        setAverageRating(averageRating);
        this.distributor = distributor;
        this.ageRating = ageRating;
        this.baseTicketPrice = baseTicketPrice;
    }

    // distributor getter and setter
    public String getDistributor() {
        return distributor;
    }

    public void setDistributor(String distributor) {
        this.distributor = distributor;
    }

    // ageRating getter and setter
    public String getAgeRating() {
        return ageRating;
    }

    public void setAgeRating(String ageRating) {
        this.ageRating = ageRating;
    }

    // baseTicketPrice getter and setter
    public int getBaseTicketPrice() {
        return baseTicketPrice;
    }

    public void setBaseTicketPrice(int baseTicketPrice) {
        this.baseTicketPrice = baseTicketPrice;
    }
}