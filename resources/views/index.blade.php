<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Materi Guru</title>
    <script>
        function changeTimeframe() {
            var timeframeSelect = document.getElementById("timeframe");
            var selectedTimeframe = timeframeSelect.value;

            if (selectedTimeframe === "semester") {
                // Tampilkan elemen untuk memilih semester
                document.getElementById("semesterDiv").style.display = "block";
                // Sembunyikan elemen untuk memilih tahun
                document.getElementById("tahunDiv").style.display = "none";
                // Sembunyikan elemen untuk memilih bulan
                document.getElementById("bulanDiv").style.display = "none";
            } else if (selectedTimeframe === "bulan") {
                // Tampilkan elemen untuk memilih bulan
                document.getElementById("bulanDiv").style.display = "block";
                // Sembunyikan elemen untuk memilih tahun
                document.getElementById("tahunDiv").style.display = "none";
                // Sembunyikan elemen untuk memilih semester
                document.getElementById("semesterDiv").style.display = "none";
            } else {
                // Tampilkan elemen untuk memilih tahun
                document.getElementById("tahunDiv").style.display = "block";
                // Sembunyikan elemen untuk memilih semester
                document.getElementById("semesterDiv").style.display = "none";
                // Sembunyikan elemen untuk memilih bulan
                document.getElementById("bulanDiv").style.display = "none";
            }
        }
    </script>
</head>
<body>

    <h1>Form Input Materi Guru</h1>

    <label for="timeframe">Pilih Periode Waktu:</label>
    <select id="timeframe" onchange="changeTimeframe()">
        <option value="tahun">Per Tahun</option>
        <option value="semester">Per Semester</option>
        <option value="bulan">Per Bulan</option>
    </select>

    <!-- Elemen untuk memilih tahun -->
    <div id="tahunDiv">
        <label for="tahun">Pilih Tahun:</label>
        <input type="text" id="tahun" name="tahun">
    </div>

    <!-- Elemen untuk memilih semester -->
    <div id="semesterDiv" style="display: none;">
        <label for="semester">Pilih Semester:</label>
        <input type="text" id="semester" name="semester">
    </div>

    <!-- Elemen untuk memilih bulan -->
    <div id="bulanDiv" style="display: none;">
        <label for="bulan">Pilih Bulan:</label>
        <input type="text" id="bulan" name="bulan">
    </div>

</body>
</html>
