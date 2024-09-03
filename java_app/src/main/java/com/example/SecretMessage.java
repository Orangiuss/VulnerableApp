package com.example;

import java.io.Serializable;

// Classe à sérialiser
public class SecretMessage implements Serializable {
    private static final long serialVersionUID = 1L;
    private String message;

    public SecretMessage(String message) {
        this.message = message;
    }

    @Override
    public String toString() {
        return "Message secret : " + message;
    }
}