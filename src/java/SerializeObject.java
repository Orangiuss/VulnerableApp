package java;
// TO-DO : Insecure Deserialization in Java 

// ysoserial is a popular tool for generating payloads for Insecure Java Deserialization.
// https://github.com/frohoff/ysoserial
// Insecure Deserialization is a vulnerability that allows an attacker to execute arbitrary code on the server by manipulating the serialized object.

import java.io.FileOutputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;
import java.SecretMessage;

public class SerializeObject {
    public static void main(String[] args) {
        SecretMessage secret = new SecretMessage("Le code est 1234!");

        try (FileOutputStream fileOut = new FileOutputStream("archive.ser");
             ObjectOutputStream out = new ObjectOutputStream(fileOut)) {
            out.writeObject(secret);
            System.out.println("Objet sérialisé et exporté dans 'archive.ser'");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
