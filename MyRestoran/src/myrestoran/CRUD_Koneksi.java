package myrestoran;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import javax.swing.JOptionPane;


public class CRUD_Koneksi {
    private static java.sql.Connection koneksi;
     
      public static java.sql.Connection getKoneksi(){
        if(koneksi == null){
          try{
              String url = "jdbc:mysql://localhost:3306/resto";
              String user = "root";
              String password = "";
              
              DriverManager.registerDriver(new com.mysql.cj.jdbc.Driver());
              
              koneksi = DriverManager.getConnection(url, user, password);
          }catch(SQLException t){
              System.out.println("Error Membuat Koneksi");
          }  
        }
        return koneksi;

    }
    
}
