// class to represent a premium format cinema film inheriting from CinemaFilm class
public class PremiumFormatCinemaFilm extends CinemaFilm {
    // private attributes
    private String screenFormat;
    private int priceSurcharge;
    private boolean requires3DGlasses;

    // empty constructor
    public PremiumFormatCinemaFilm() {
    }

    // constructor with all attributes from both parent and child classes
    public PremiumFormatCinemaFilm(String filmCode, String title, String genre, int duration,
                                    float averageRating, String distributor, String ageRating,
                                    int baseTicketPrice, String screenFormat, int priceSurcharge,
                                    boolean requires3DGlasses) {
        setFilmCode(filmCode);
        setTitle(title);
        setGenre(genre);
        setDuration(duration);
        setAverageRating(averageRating);
        setDistributor(distributor);
        setAgeRating(ageRating);
        setBaseTicketPrice(baseTicketPrice);
        this.screenFormat = screenFormat;
        this.priceSurcharge = priceSurcharge;
        this.requires3DGlasses = requires3DGlasses;
    }

    // screenFormat getter and setter
    public String getScreenFormat() {
        return screenFormat;
    }

    public void setScreenFormat(String screenFormat) {
        this.screenFormat = screenFormat;
    }

    // priceSurcharge getter and setter
    public int getPriceSurcharge() {
        return priceSurcharge;
    }

    public void setPriceSurcharge(int priceSurcharge) {
        this.priceSurcharge = priceSurcharge;
    }

    // requires3DGlasses getter and setter
    public boolean getRequires3DGlasses() {
        return requires3DGlasses;
    }

    public void setRequires3DGlasses(boolean requires3DGlasses) {
        this.requires3DGlasses = requires3DGlasses;
    }
}