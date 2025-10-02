var utf8_decode = function (strData) { // eslint-disable-line camelcase
    //  discuss at: https://locutus.io/php/utf8_decode/
    // original by: Webtoolkit.info (https://www.webtoolkit.info/)
    //    input by: Aman Gupta
    //    input by: Brett Zamir (https://brett-zamir.me)
    // improved by: Kevin van Zonneveld (https://kvz.io)
    // improved by: Norman "zEh" Fuchs
    // bugfixed by: hitwork
    // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
    // bugfixed by: Kevin van Zonneveld (https://kvz.io)
    // bugfixed by: kirilloid
    // bugfixed by: w35l3y (https://www.wesley.eti.br)
    //   example 1: utf8_decode('Kevin van Zonneveld')
    //   returns 1: 'Kevin van Zonneveld'
    const tmpArr = []
    let i = 0
    let c1 = 0
    let seqlen = 0
    strData += ''
    while (i < strData.length) {
      c1 = strData.charCodeAt(i) & 0xFF
      seqlen = 0
      // https://en.wikipedia.org/wiki/UTF-8#Codepage_layout
      if (c1 <= 0xBF) {
        c1 = (c1 & 0x7F)
        seqlen = 1
      } else if (c1 <= 0xDF) {
        c1 = (c1 & 0x1F)
        seqlen = 2
      } else if (c1 <= 0xEF) {
        c1 = (c1 & 0x0F)
        seqlen = 3
      } else {
        c1 = (c1 & 0x07)
        seqlen = 4
      }
      for (let ai = 1; ai < seqlen; ++ai) {
        c1 = ((c1 << 0x06) | (strData.charCodeAt(ai + i) & 0x3F))
      }
      if (seqlen === 4) {
        c1 -= 0x10000
        tmpArr.push(String.fromCharCode(0xD800 | ((c1 >> 10) & 0x3FF)))
        tmpArr.push(String.fromCharCode(0xDC00 | (c1 & 0x3FF)))
      } else {
        tmpArr.push(String.fromCharCode(c1))
      }
      i += seqlen
    }
    return tmpArr.join('')
  }

  var utf8_encode = function(argString) { // eslint-disable-line camelcase
    //  discuss at: https://locutus.io/php/utf8_encode/
    // original by: Webtoolkit.info (https://www.webtoolkit.info/)
    // improved by: Kevin van Zonneveld (https://kvz.io)
    // improved by: sowberry
    // improved by: Jack
    // improved by: Yves Sucaet
    // improved by: kirilloid
    // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
    // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
    // bugfixed by: Ulrich
    // bugfixed by: Rafał Kukawski (https://blog.kukawski.pl)
    // bugfixed by: kirilloid
    //   example 1: utf8_encode('Kevin van Zonneveld')
    //   returns 1: 'Kevin van Zonneveld'
    if (argString === null || typeof argString === 'undefined') {
      return ''
    }
    // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");
    const string = (argString + '')
    let utftext = ''
    let start
    let end
    let stringl = 0
    start = end = 0
    stringl = string.length
    for (let n = 0; n < stringl; n++) {
      let c1 = string.charCodeAt(n)
      let enc = null
      if (c1 < 128) {
        end++
      } else if (c1 > 127 && c1 < 2048) {
        enc = String.fromCharCode(
          (c1 >> 6) | 192, (c1 & 63) | 128
        )
      } else if ((c1 & 0xF800) !== 0xD800) {
        enc = String.fromCharCode(
          (c1 >> 12) | 224, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
        )
      } else {
        // surrogate pairs
        if ((c1 & 0xFC00) !== 0xD800) {
          throw new RangeError('Unmatched trail surrogate at ' + n)
        }
        const c2 = string.charCodeAt(++n)
        if ((c2 & 0xFC00) !== 0xDC00) {
          throw new RangeError('Unmatched lead surrogate at ' + (n - 1))
        }
        c1 = ((c1 & 0x3FF) << 10) + (c2 & 0x3FF) + 0x10000
        enc = String.fromCharCode(
          (c1 >> 18) | 240, ((c1 >> 12) & 63) | 128, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
        )
      }
      if (enc !== null) {
        if (end > start) {
          utftext += string.slice(start, end)
        }
        utftext += enc
        start = end = n + 1
      }
    }
    if (end > start) {
      utftext += string.slice(start, stringl)
    }
    return utftext
  }