import java.io.FileInputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.Serializable;

import com.example.SecretMessage;

public class DeserializeObject {
    public static void main(String[] args) {
        try (FileInputStream fileIn = new FileInputStream("archive.ser");
             ObjectInputStream in = new ObjectInputStream(fileIn)) {
            Object obj = in.readObject();
            
            // Vérifiez le type et affichez le contenu
            if (obj instanceof SecretMessage) {
                SecretMessage secret = (SecretMessage) obj;
                System.out.println("Objet désérialisé : " + secret);
                
                // Traitez les données extraites ici
            } else {
                System.out.println("L'objet désérialisé n'est pas du type attendu.");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}