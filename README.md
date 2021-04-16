Work in progress...

# Lazydocs

Lazydocs is a website that allows user to upload template .docx file and make text replacements. Text replacements in .docx file should be marked with "${%variable_name%}".

It uses [PHPWord library](https://github.com/PHPOffice/PHPWord) to process word documents.

Sameple template file:
[ld_template.docx](https://github.com/kirmal-mal/lazydocs/files/6327124/ld_template.docx)

## How to use:

### 1. Create a profile on the website
You can create a profile on the website and then log in.
![Screenshot 2021-04-16 114505](https://user-images.githubusercontent.com/11226409/115066472-d2046900-9eac-11eb-91b8-a1d3600571be.png)

### 2. Upload template to the server
You should select file from your computer and press button "Upload template"
![Screenshot 2021-04-16 115432](https://user-images.githubusercontent.com/11226409/115067910-c9ad2d80-9eae-11eb-9626-e2a8150e5cb9.png)

### 3. Fill out replacemnt table
Incease column size of the table to the number of replacement variables in the text.
Increase rows to the number of files you want to create.

The very first column in each row is the name of the downloaded file.
On the row and column intersections type the text to replace for this file.
![Screenshot 2021-04-16 115604](https://user-images.githubusercontent.com/11226409/115068052-f6614500-9eae-11eb-8595-bd1cc1165682.png)

### 4. Download files
Press download icon to the left of the filename in each row to download this file with replacements
![Screenshot 2021-04-16 115644](https://user-images.githubusercontent.com/11226409/115068462-8606f380-9eaf-11eb-860a-5dfc66f4df8b.png)

In this example you will get two .docx files with text replaced:
[rep1.docx](https://github.com/kirmal-mal/lazydocs/files/6327240/rep1.docx)
[rep2.docx](https://github.com/kirmal-mal/lazydocs/files/6327241/rep2.docx)


