CrawlerTask
===========

A Symfony project created on January 14, 2017, 10:12 am.

http://symfony.com/doc/current/components/dom_crawler.html
https://github.com/J-Mose/CommandSchedulerBundle

smart phone: http://www.gsmarena.com/
list product support
    - name or model
    - manual admin input detail about product => DB(auto)
    product {
        name: "abc",
        model: "unique for each model",
        type: "product type for format",
        category: ["abc", "def"],
        detail: {
            field1: "aaa",
            ...
        }
        buyer: {
            name: "n1",
            logo: "l1",
            price: 120,
            url: "http://dfsdfds",
            address: "",
            area: "hcm,hn,...",
            phone: "",
            isVerified: false,
        }
    }
    -search some site buy it and element auto for each site