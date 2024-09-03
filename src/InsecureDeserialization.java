// TO-DO : Insecure Deserialization in Java 

// ysoserial is a popular tool for generating payloads for Insecure Java Deserialization.
// https://github.com/frohoff/ysoserial
// Insecure Deserialization is a vulnerability that allows an attacker to execute arbitrary code on the server by manipulating the serialized object.
import java.io.FileOutputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;

class User implements Serializable {
    private static final long serialVersionUID = 1L;
    public String name;
    public String password;
    public User(String name, String password) {
        this.name = name;
        this.password = password;
    }
}

public class InsecureDeserialization {
    public static void main(String[] args) {
        User user = new User("admin", "password");
        String filename = "user.ser";
        try {
            FileOutputStream file = new FileOutputStream(filename);
            ObjectOutputStream out = new ObjectOutputStream(file);
            out.writeObject(user);
            out.close();
            file.close();
            System.out.println("Object has been serialized");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}