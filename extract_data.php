  <?php

  use Illuminate\Support\Facades\DB;

  $html = file_get_contents('resume.html'); 
  $dom = new DOMDocument();
  @$dom->loadHTML($html);

  $xpath = new DOMXPath($dom);

  // Example: Extract data from specific elements
  $name = $xpath->query('//h1[@id="name"]')->item(0)->nodeValue;
  $email = $xpath->query('//a[@class="email"]')->item(0)->nodeValue;
  // ... extract other data

  // Store the extracted data in the database (example with a single table)
  DB::table('resumes')->insert([
      'name' => $name,
      'email' => $email,
      // ... other extracted data
  ]);

  echo "Data extracted and stored in the database.";
  ?>