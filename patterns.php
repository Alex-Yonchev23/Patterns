<?php

class WebPage {
    public $title;
    public $header;
    public $content;
    public $footer;

    public function __construct($title, $header, $content, $footer) {
        $this->title = $title;
        $this->header = $header;
        $this->content = $content;
        $this->footer = $footer;
    }

    public function display() {
        echo "<html>";
        echo "<head>";
        echo "<style>
                body {
                    font-family: 'Arial', sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #35274e; /* purple */
                    color: #ddd;
                }
                .container {
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #1e1e1e; /* black */
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                h1 {
                    background-color: #8b5fbf; /* dark purple */
                    color: #ddd;
                    padding: 20px;
                    text-align: center;
                    margin: 0;
                    border-top-left-radius: 8px;
                    border-top-right-radius: 8px;
                }
                header {
                    background-color: #57406c; /* dark purple */
                    color: #ddd;
                    padding: 10px;
                    text-align: center;
                    margin-bottom: 20px;
                    border-bottom-left-radius: 8px;
                    border-bottom-right-radius: 8px;
                }
                article {
                    padding: 20px;
                    margin-bottom: 20px;
                    border-radius: 8px;
                    background-color: #35274e; /* purple */
                }
                p {
                    line-height: 1.6;
                    margin-bottom: 15px;
                }
                footer {
                    background-color: #57406c; /* dark purple */
                    color: #ddd;
                    padding: 10px;
                    text-align: center;
                    margin-bottom: 20px;
                    border-bottom-left-radius: 8px;
                    border-bottom-right-radius: 8px;
                }
                form {
                    margin-top: 20px;
                }
                label {
                    display: block;
                    margin-bottom: 8px;
                }
                input {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 15px;
                    border: 1px solid #57406c; /* dark purple */
                    border-radius: 4px;
                    box-sizing: border-box;
                }
                button {
                    background-color: #8b5fbf; /* dark purple */
                    color: #ddd;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
              </style>";
        echo "</head>";
        echo "<body>";
        echo "<div class='container'>";
        echo "<h1>{$this->title}</h1>";
        echo "<header>{$this->header}</header>";
        echo "<article>{$this->content}</article>";
        echo "<footer>{$this->footer}</footer>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    }
}

class WebPageBuilder {
    private $title;
    private $header;
    private $content;
    private $footer;

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setHeader($header) {
        $this->header = $header;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setFooter($footer) {
        $this->footer = $footer;
    }

    public function build() {
        return new WebPage($this->title, $this->header, $this->content, $this->footer);
    }
}

class WebPageDirector {
    public function createArticle($content) {
        $builder = new WebPageBuilder();
        $builder->setTitle("Article");
        $builder->setHeader("Header");
        $builder->setContent($content);
        $builder->setFooter("Contact us at contact@example.com");
        return $builder->build();
    }

    public function createForm($title, $fields) {
        $builder = new WebPageBuilder();
        $builder->setTitle($title);
        $builder->setHeader("Registration Form");
        $builder->setContent($fields);
        $builder->setFooter("Form Footer");
        return $builder->build();
    }
}

$director = new WebPageDirector();

$articleContent = "<p>This is a sample article content. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac metus euismod, scelerisque massa nec, volutpat urna.</p>
                  <p>Suspendisse potenti. Integer tristique auctor nibh, vel scelerisque justo vestibulum ac. Nulla facilisi. Sed nec fermentum quam.</p>";

$articlePage = $director->createArticle($articleContent);
$articlePage->display();
echo "<hr>";

$formFields = "<form>
                    <label for='name'>Name:</label>
                    <input type='text' id='name' name='name' required>
                    <label for='email'>Email:</label>
                    <input type='email' id='email' name='email' required>
                    <label for='password'>Password:</label>
                    <input type='password' id='password' name='password' required>
                    <button type='submit'>Submit</button>
               </form>";

$formPage = $director->createForm("User Registration", $formFields);
$formPage->display();
?>
