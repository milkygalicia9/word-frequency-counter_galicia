<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            border: 2px solid #333;
            margin: 20px auto;
            background-color: #7FFF00;
        }
        th {
            background-color: #333;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #555;
            text-align: left;
        }
        th.word-header {
            background-color: #006400; 
        }
        th.frequency-header {
            background-color: #006400; 
        }
        td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: center; 
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Word Frequency Results</h1>

    <?php
    /**
     * 
     *
     * @param array 
     * @return array 
     */
    function calculateWordFrequency($words) {
        $stopWords = ["the", "and", "in"]; 
        
        $wordFrequency = array_count_values($words);
        
        
        foreach ($stopWords as $stopWord) {
            unset($wordFrequency[$stopWord]);
        }
        
        return $wordFrequency;
    }

    /**
     * 
     *
     * @param array 
     * @param string
     * @return array
     */
    function sortWordFrequency($wordFrequency, $sortOrder) {
        if ($sortOrder === "asc") {
            asort($wordFrequency);
        } else {
            arsort($wordFrequency);
        }
        return $wordFrequency;
    }

    /**
     *
     *
     * @param array 
     * @param int 
     * @return array 
     */
    function limitWordFrequency($wordFrequency, $limit) {
        return array_slice($wordFrequency, 0, $limit);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputText = $_POST['text'];
        $selectedSortOrder = $_POST['sort']; 
        $selectedLimit = $_POST['limit']; 

        $words = str_word_count(strtolower($inputText), 1);
        $wordFrequency = calculateWordFrequency($words);
        $sortedWordFrequency = sortWordFrequency($wordFrequency, $selectedSortOrder);
        $limitedWordFrequency = limitWordFrequency($sortedWordFrequency, $selectedLimit);

        echo '<table>';
        echo '<tr>
                <th class="word-header">Word</th>
                <th class="frequency-header">Frequency</th>
              </tr>';
        
        foreach ($limitedWordFrequency as $word => $frequency) {
            echo "<tr><td>$word</td><td>$frequency</td></tr>";
        }
        
        echo '</table>';
    } else {
        echo '<p>No data submitted.</p>';
    }
    ?>

</body>
</html>
