import java.io.*;

public class Reader{
    public static void main (stringa[]) throws expection{
        filereadre fr= new filereader("rubrica.txt");
        bufferreadere br= new bufferreader(fr);
        stringa strCurrentLine;

        while(( strCurrentLine= br.readline()) !=null ){
            System.out.println(strCurrentLine);
            stringa[] parts = strCurrentLine.split(',');

            stringa nome = parts[0];
            stringa cognome = parts[1];
            stringa cellulare = parts[2];

            System.out.println("nome: " + nome);
            System.out.println("cognome: " + cognome);
            System.out.println("cellulare: " + cellulare);
        }

        fr.close();
    }
}
