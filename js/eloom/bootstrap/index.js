Element.prototype.triggerEvent = function (eventName) {
    if (document.createEvent) {
        var evt = document.createEvent('HTMLEvents');
        evt.initEvent(eventName, true, true);

        return this.dispatchEvent(evt);
    }

    if (this.fireEvent) {
        return this.fireEvent('on' + eventName);
    }
};

Object.extend(Prototype.Browser, {
    ie6: (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) ? (Number(RegExp.$1) == 6 ? true : false) : false,
    ie7: (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) ? (Number(RegExp.$1) == 7 ? true : false) : false,
    ie8: (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) ? (Number(RegExp.$1) == 8 ? true : false) : false,
    ie9: (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) ? (Number(RegExp.$1) == 9 ? true : false) : false,
    ie10: (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) ? (Number(RegExp.$1) == 10 ? true : false) : false
});

/**
 * Moeda
 */
if (typeof EloomMoeda == 'undefined' || !EloomMoeda) {
    var EloomMoeda = {};
}
EloomMoeda.digitos = 2;

EloomMoeda.format = function (num, digit) {
    num = EloomMoeda.formataNumeroUS(num);
    num = num.replace(/[\.]/g, ",");

    var inicio = EloomMoeda.getFront(num, ',') * 1;
    if (num != inicio) {
        var fim = EloomMoeda.getEnd(num, ',');
        fim = fim + '';
    } else {
        var fim = '';
    }

    if (isNaN(inicio))
        inicio = '0';
    if (isNaN(fim))
        fim = '';
    if (digit > 0)
        while (fim.length < digit)
            fim = fim + '0';
    if (fim.length > digit)
        fim = fim.substring(0, digit);

    // Inclui pontos separadores de milhar
    for (i = inicio.toString().length - 3; i > 0; i = i - 3) {
        inicio = inicio.toString().substr(0, i) + '.'
                + inicio.toString().substr(i);
    }

    if (inicio.toString().substr(0, 2) == "-.") {
        inicio = "-" + inicio.toString().substr(2);
    }

    if (digit > 0) {
        return inicio.toString() + ',' + fim;
    } else {
        return inicio.toString();
    }

    return null;
};

EloomMoeda.getFront = function (mainStr, searchStr) {
    var foundOffset = mainStr.indexOf(searchStr);
    if (foundOffset == -1) {
        return mainStr;
    }
    return mainStr.substring(0, foundOffset)
};

EloomMoeda.getEnd = function (mainStr, searchStr) {
    var foundOffset = mainStr.indexOf(searchStr)
    if (foundOffset == -1) {
        return mainStr;
    }
    return mainStr.substring(foundOffset + searchStr.length, mainStr.length);
};

EloomMoeda.formataNumeroUS = function (num) {
    if (!num) {
        return '0';
    }
    if (num.toString().indexOf(',') != -1) {
        num = num.toString().replace(/\$|\./g, '');
    }
    return num.toString().replace(/\$|\,/g, '.');
};

/**
 * Mask
 */
var EloomMask = Class.create();
EloomMask.prototype = {
    initialize: function () {

    },
    canApplayMask: function () {
        if (Prototype.Browser.ie9 || Prototype.Browser.ie10) {
            if (parseFloat(Prototype.Version.substring(0, 3)) < 1.7) {
                return false;
            }
        }
        return true;
    },
    telephone: function (selector, input) {
        if (this.canApplayMask()) {
            var element = new MaskedInput(selector);
            element.unmask();

            var phone = input.getValue().replace(/\D/g, '');
            if (phone && phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        }
    },
    cpf: function (selector) {
        if (this.canApplayMask()) {
            var maskedInputCpf = new MaskedInput(selector);
            maskedInputCpf.unmask();
            maskedInputCpf.mask('999.999.999-99');
        }
    },
    cnpj: function (selector) {
        if (this.canApplayMask()) {
            var maskedInputCnpj = new MaskedInput(selector);
            maskedInputCnpj.unmask();
            maskedInputCnpj.mask('99.999.999/9999-99');
        }
    },
    day: function (selector) {
        if (this.canApplayMask()) {
            var maskedInputDay = new MaskedInput(selector);
            maskedInputDay.unmask();
            maskedInputDay.mask('99');
        }
    },
    month: function (selector) {
        if (this.canApplayMask()) {
            var maskedInputMonth = new MaskedInput(selector);
            maskedInputMonth.unmask();
            maskedInputMonth.mask('99');
        }
    },
    fullYear: function (selector) {
        if (this.canApplayMask()) {
            var maskedInputFullYear = new MaskedInput(selector);
            maskedInputFullYear.unmask();
            maskedInputFullYear.mask('9999');
        }
    }
};
var eloomMaskInst = new EloomMask();