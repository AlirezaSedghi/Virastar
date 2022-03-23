<h1 align="center">
    Virastar<br/>ویراستار
</h1>
<p align="center">
Virastar is a Persian text cleaner.
</p>

<p align="center">
  <a href="" rel="nofollow"><img alt="Required PHP Version" src="https://img.shields.io/badge/php-%5E7.0.0-blue?style=flat-square"></a>
  <a href="https://packagist.org/packages/alirezasedghi/virastar" rel="nofollow"><img alt="Total Downloads" src="https://poser.pugx.org/alirezasedghi/virastar/downloads?style=flat-square"></a>
  <a href="https://packagist.org/packages/alirezasedghi/virastar" rel="nofollow"><img alt="Latest Stable Version" src="https://poser.pugx.org/alirezasedghi/virastar/v/stable?style=flat-square"></a>
  <a href="https://raw.githubusercontent.com/AlirezaSedghi/Virastar/master/LICENSE" rel="nofollow"><img alt="License" src="https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square"></a>
  <a href="https://github.com/AlirezaSedghi/Virastar/issues" rel="nofollow"><img alt="GitHub issues" src="https://img.shields.io/github/issues/AlirezaSedghi/Virastar.svg?style=flat-square"></a>
</p>

> This repository is PHP port of [brothersincode/virastar](https://github.com/brothersincode/virastar)

Official website and [Persian usage guide](https://github.alirezasedghi.com/virastar/#documents)

## Install
```bash
composer require alirezasedghi/virastar
```

## Usage
```php
// Require Composer's autoloader.
require 'vendor/autoload.php';

// Using Virastar namespace.
use Alirezasedghi\Virastar\Virastar;

$virastar   = new Virastar();
$text       = "فارسي را كمی درست تر می نويسيم";
$cleaned    = $virastar->cleanup($text);

echo $cleaned; // Outputs: "فارسی را کمی درست‌تر می‌نویسیم"
```

#### Virastar([options])

##### options
Type: `array`

```php
$virastar   = new Virastar([
        "fix_english_numbers": false,
        "cleanup_line_breaks": false
    ]);
```

## Options and Specifications
Virastar comes with a list of options to control its behavior.

#### `normalize_eol`
_default_: `true`
- replace windows end of lines with unix eol (`\n`)

#### `decode_html_entities`
_default_: `true`
- converts numeral and selected html character-sets into original characters

#### `fix_dashes`
_default_: `true`
- replaces triple dash to mdash
- replaces double dash to ndash

#### `fix_three_dots`
_default_: `true`
- removes spaces between dots
- replaces three dots with ellipsis character

#### `normalize_ellipsis`
_default_: `true`
- replaces more than one ellipsis with one
- replaces (space|tab|zwnj) after ellipsis with one space

#### `normalize_dates`
_default_: `true`
- re-orders date parts with slash as delimiter

#### `fix_english_quotes_pairs`
_default_: `true`
- replaces english quote pairs (`“”`) with their persian equivalent (`«»`)

#### `fix_english_quotes`
_default_: `true`
- replaces english quote marks with their persian equivalent

#### `fix_hamzeh`
_default_: `true`
- replaces `ه` followed by (space|ZWNJ|lrm) follow by `ی` with `هٔ`
- replaces `ه` followed by (space|ZWNJ|lrm|nothing) follow by `ء` with `هٔ`
- replaces `هٓ` or single-character `ۀ` with the standard `هٔ`

#### `fix_hamzeh_arabic`
_default_: `false`
- converts arabic hamzeh `ة` to `هٔ`

#### `cleanup_rlm`
_default_: `true`
- converts Right-to-left marks followed by persian characters to zero-width non-joiners (ZWNJ)

#### `cleanup_zwnj`
_default_: `true`
- converts all soft hyphens (`&shy;`) into zwnj
- removes more than one zwnj
- cleans zwnj after characters that don't connect to the next
- cleans zwnj before and after numbers, english words, spaces and punctuations
- removes unnecessary zwnj on start/end of each line

#### `fix_arabic_numbers`
_default_: `true`
- replaces arabic numbers with their persian equivalent

#### `fix_english_numbers`
_default_: `true`
- replaces english numbers with their persian equivalent

#### `fix_numeral_symbols`
_default_: `true`
- replaces english percent signs (U+066A)
- replaces dots between numbers into decimal separator (U+066B)
- replaces commas between numbers into thousands separator (U+066C)

#### `fix_misc_non_persian_chars`
_default_: `true`
- replaces arabic normal/swash kaf with its persian equivalent
- replaces arabic/urdu/pushtu/uyghur yeh with its persian equivalent
- replaces kurdish he with its persian equivalent

#### `fix_punctuations`
_default_: `true`
- replaces `,`, `;` with its persian equivalent

#### `fix_question_mark`
_default_: `true`
- replaces question marks with its persian equivalent

#### `fix_prefix_spacing`
_default_: `true`
- puts zwnj between the word and the prefix:
    - `mi*`, `nemi*`, `bi*`

#### `fix_suffix_spacing`
_default_: `true`
- puts zwnj between the word and the suffix:
    - `*ha`, `*haye`
    - `*am`, `*at`, `*ash`, `*ei`, `*eid`, `*eem`, `*and`, `*man`, `*tan`, `*shan`
    - `*tar`, `*tari`, `*tarin`
    - `*hayee`, `*hayam`, `*hayat`, `*hayash`, `*hayetan`, `*hayeman`, `*hayeshan`

#### `fix_suffix_misc`
_default_: `true`
- replaces `ه` followed by `ئ` or `ی`, and then by `ی`, with `ه‌ای`

#### `fix_spacing_for_braces_and_quotes`
_default_: `true`
- removes inside spaces and more than one outside for `()`, `[]`, `{}`, `“”` and `«»`

#### `fix_spacing_for_punctuations`
_default_: `true`
- removes space before punctuations
- removes more than one space after punctuations, except followed by new-lines
- removes space after colon that separates time parts
- removes space after dots in numbers
- removes space before some common domain tlds
- removes space between question and exclamation marks
- removes space between same marks

#### `fix_diacritics`
_default_: `true`
- cleans zwnj before diacritic characters
- cleans more than one diacritic characters
- clean spaces before diacritic characters

### `remove_diacritics`
_default_: `false`
- removes all diacritic characters

#### `fix_persian_glyphs`
_default_: `true`
- converts incorrect persian glyphs to standard characters

#### `fix_misc_spacing`
_default_: `true`
- removes space before parentheses on misc cases
- removes space before braces containing numbers

#### `cleanup_spacing`
_default_: `true`
- replaces more than one space with just a single one
- cleans whitespace/zwnj between new-lines

#### `cleanup_line_breaks`
_default_: `true`
- cleans more than **two** contiguous line breaks

#### `cleanup_begin_and_end`
_default_: `true`
- removes space/tab/zwnj/nbsp from the beginning of the new-lines
- remove spaces, tabs, zwnj, direction marks and new lines from the beginning and end of text

### markdown
#### `markdown_normalize_braces`
_default_: `true`
- remove spaces between `[]` and `()` (`[text] (link)` into `[text](link)`)
- removes space between `!` and opening brace (`! [alt](src)` into `![alt](src)`)
- remove spaces inside double `()`, `[]`, `{}` (`[[ text ]]` into `[[text]]`)
- remove spaces between double `()`, `[]`, `{}` (`[[text] ]` into `[[text]]`)

#### `markdown_normalize_lists`
_default_: `true`
- removes extra lines between two items on a markdown list beginning with `-`, `*` or `#`

#### `skip_markdown_ordered_lists_numbers_conversion`
_default_: `false`
- skips converting english numbers of ordered lists in markdown

### aggressive editing
#### `cleanup_extra_marks`
_default_: `true`
- replaces more than one exclamation mark with just one
- replaces more than one english or persian question mark with just one
- re-orders consecutive marks: `?!` into `!?`

#### `kashidas_as_parenthetic`
_default_: `true`
- replaces kashidas to ndash in parenthetic

#### `cleanup_kashidas`
_default_: `true`
- converts kashida between numbers to ndash
- removes all kashidas between non-whitespace characters

### extras
#### `preserve_front_matter`
_default_: `true`
- preserves front matter data in the text

#### `preserve_HTML`
_default_: `true`
- preserves all html tags in the text

#### `preserve_comments`
_default_: `true`
- preserves all html comments in the text

#### `preserve_entities`
_default_: `true`
- preserves all html entities in the text

#### `preserve_URIs`
_default_: `true`
- preserves all uri strings in the text

#### `preserve_brackets`
_default_: `false`
- preserves strings inside square brackets (`[]`)

#### `preserve_braces`
_default_: `false`
- preserves strings inside curly braces (`{}`)

#### `preserve_nbsp`
_default_: `true`
- preserves all no-break space entities in the text

## License
This software is licensed under the MIT License. [View the license](LICENSE).
