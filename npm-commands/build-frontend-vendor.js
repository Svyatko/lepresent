// Get a reference to the file system module
var fs = require('fs');

// Get a reference to the uglify-js module
var UglifyJS = require('uglify-js');

// Get a reference to the minified version of the files
var result = UglifyJS.minify(
    [
        fs.readFileSync("node_modules/jquery/dist/jquery.js", "utf8"),
        fs.readFileSync("node_modules/bootstrap/dist/js/bootstrap.js", "utf8"),

    ],
    {
        compress: true
    }
);

// View the output
// console.log(result.code);

fs.writeFile("public/js/frontend/vendor.min.js", result.code, function(err) {
    if(err) {
        console.log(err);
    } else {
        console.log("File was successfully saved.");
    }
});
