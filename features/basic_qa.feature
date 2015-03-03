# language: id

Fitur: Tanya Jawab Sederhana
  Supaya hidupku lebih mudah,
  Si bot harus bisa melakukan pekerjaan sederhana seperti belajar dan berhitung
  
  Skenario: 
    Dengan saya punya bot
    Dan saya ajari, jika diajak bicara "halo", maka jawab dengan "halo juga"
    Ketika saya bicara ke dia "halo"
    Maka dia harus menjawab "halo juga"

  Skenario: 
    Dengan saya punya bot
    Dan saya ajari, jika diajak bicara "hitung (\d+.*\d+)", maka proses perintah "echo({:1}) = eval({:1})"
    Ketika saya suruh dia untuk "hitung 1+1"
    Maka dia harus menjawab "1+1 = 2"

  Skenario: 
    Dengan saya punya bot
    Dan saya ajari, jika diajak bicara "hitung ([\d\(]+.*[\d\)]+)", maka proses perintah "echo({:1}) = eval({:1})"
    Ketika saya suruh dia untuk "hitung 3 * (2 + 5)"
    Maka dia harus menjawab "3 * (2 + 5) = 21"

