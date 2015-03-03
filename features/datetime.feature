# language: id

Fitur: Tanya Jawab Sederhana
  Si bot harus bisa mengenali tanggal dan waktu

  Skenario: 
    Dengan saya punya bot
    Dan saya ajari, jika diajak bicara "jam berapa sekarang?", maka proses perintah "eval(now().format('Y-m-d H:i:s'))"
    Ketika saya bicara ke dia "jam berapa sekarang?"
    Maka dia harus menjawab dengan waktu sekarang dengan format "Y-m-d H:i:s"

