if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              // if ($row["mac"]=="BCDDC22D22AB") {
              //   $row["mac"] = $dev;
              // }
            echo "<tr><td>" . $no++. "</td><td>" . $row["gerbang"] . "</td><td>"
            . $row["golongan"]. "</td><td>". $row["waktu"]. "</td><td>"
            . $row["harga"]. "</td><td>"."<img src=file/".$row["gambar"]."</td></tr>";
            }
            }