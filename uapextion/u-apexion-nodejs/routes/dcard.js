const { default: axios } = require("axios");
const fetch = require('node-fetch');
const express = require("express");
const db = require("../modules/connect-db");
const router = express.Router();

//dcard api
router.get("/api/dcard", (req, res) => {
  console.log('123');
  fetch("https://www.dcard.tw/_api/posts").then(r=>r.json()).then(data => res.json(data));
});

module.exports = router;
