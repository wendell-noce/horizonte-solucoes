Icons
==========

If you want to add or modify an icon to the `icons` font file, you will need to follow some steps:

## Creating or modifying an icon

All icons used in the `icons` font are available in the `icons.eps`. If you want to change or add a new icon it's recommended that you use this file as a base.

> You will need a vector editor software (like **Adobe Illustrator** or **Corel Draw**) to edit this file.

Once you have the icon you want, export it to a separated `.svg` file and put it in the `svg` folder.

> The svg file name will be used as the class name for the icon.

## Updating the font files

When you have the SVGs for the new icons follow the steps below:

1. Go to the [**Icomoon**](https://icomoon.io/app/) website.
2. Click in the `Import Icons` button.
3. Upload all SVG icon files from the `svg` folder to **Icomoon**.
4. Once uploaded, select all uploaded icons and deselect any unwanted icon.
5. Click in `Generate Font`.
6. Click in the configuration icon in the left of the `Download` button, and set the configurations as showed in the image above.

![alt text](icomoon-settings.png "Iconmoon Settings")

7. Download the font package.
8. Copy the font files to the icons folder in the project and replace the previous files.
9. Since icomoon doesn't generate a .woff2 font file, you need to convert one of the downloaded font to this format. You can use this [online converter](https://everythingfonts.com/ttf-to-woff2).
10. Open the `variables.scss` (from the downloaded package) and copy the icons variables to the `_icons.scss` into the `$icons` variable adapting them to the existing format (atribute and value).
11. Once everithing is done, recompile the theme styles (sass) and you can use the new icons.