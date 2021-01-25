var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('../views/landingPage/index', { title: 'Inicio', layout:'../views/layouts/landing'});
});

module.exports = router;
