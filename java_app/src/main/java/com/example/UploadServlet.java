import java.io.File;
import java.io.FileOutputStream;
import java.io.InputStream;
import java.io.OutputStream;
import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;

// @WebServlet("/uploadServlet")
@MultipartConfig
public class UploadServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, java.io.IOException {
        Part filePart = request.getPart("file");
        String fileName = "uploaded_file.ser"; // Nom du fichier sauvegardé

        File file = new File(getServletContext().getRealPath("/") + fileName);

        try (InputStream fileContent = filePart.getInputStream();
             OutputStream outStream = new FileOutputStream(file)) {
            byte[] buffer = new byte[1024];
            int bytesRead;

            while ((bytesRead = fileContent.read(buffer)) != -1) {
                outStream.write(buffer, 0, bytesRead);
            }
            response.getWriter().println("Fichier téléversé avec succès !");
        } catch (Exception e) {
            e.printStackTrace();
            response.getWriter().println("Erreur lors du téléversement.");
        }
    }
}
