# Require any additional compass plugins here
require 'ceaser-easing'
# Set this to the root of your project when deployed:
http_path = "/public/"
css_dir = "public/css"
sass_dir = "dev/scss/"
images_dir = "public/images"
javascripts_dir = "dev/js/"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
# line_comments = false

#sass_options = {:cache_location => "..\..\tmp\.sass-cache"}

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass public/css/scss scss && rm -rf sass && mv scss sass
sass_options = {:cache => false}

