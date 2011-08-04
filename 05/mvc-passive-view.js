// MVP - Passive View

var myapp = {};

myapp.Model = function () {
    var val = 5;
    this.add = function (v) {
        val += v;
    };
    this.sub = function (v) {
        val -= v;
    };
    this.getVal = function () {
        return val;
    };
};

myapp.Presenter = function () {
    var model = null;
    var view = null;
    this.init = function (v) {
        model = new myapp.Model();
        view = v;
        view.setNum(model.getVal());
    };
    this.increase = function () {
        model.add(1);
        view.setNum(model.getVal());
    };
    this.decrease = function () {
        model.sub(1);
        view.setNum(model.getVal());
    };
};

myapp.view = {
    $increaseButton: null,
    $decreaseButton: null,
    $num: null,
    presenter: null,
    init: function () {
        this.presenter = new myapp.Presenter();
        this.$increaseButton = $('#increase');
        this.$decreaseButton = $('#decrease');
        this.$num = $('#num');
        this.presenter.init(this);
        this.bindEvents();
    },
    bindEvents: function () {
        var view = this;
        var presenter = this.presenter;
        this.$increaseButton.click(function () {
            presenter.increase();
        });
        this.$decreaseButton.click(function () {
            presenter.decrease();
        });
    },
    setNum: function (num) {
        this.$num.val(num);
    }
};

$(function () {
    myapp.view.init();
});