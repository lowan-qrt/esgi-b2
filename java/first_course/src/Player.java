import java.util.Locale;
import java.util.Scanner;

public class Player {
    static Scanner scanner = new Scanner(System.in);

    // Attributes
    String pseudo;
    int pv;
    int attack;
    int shield;

    public Player() {
        this.pseudo = "";
        this.pv = 100;
        this.attack = 10;
        this.shield = 100;
    }

    public enum playerType {
        KNIGHT,
        WIZARD,
        MONSTER
    }

    public void createPlayer() {
        do {
            System.out.print("\nSaisissez un pseudo : ");
            this.pseudo = scanner.nextLine();
        } while ((this.pseudo.trim()).isEmpty());
        this.pseudo = this.pseudo.substring(0,1).toUpperCase() + this.pseudo.substring(1).toLowerCase();
        System.out.println(this.pseudo);
    }
}
