const smartgrid = require('smart-grid');

const settings = {
    columns: 12,
    offset: '30px',
    container: {
        maxWidth: '1240px',
        fields: '60px'
    },
    breakPoints: {
        lg: {
            width: "1240px",
            fields: "30px"
        },
        md: {
            width: "1024px",
        },
        sm: {
            width: "760px",
            fields: "15px"
        },
        xs: {
            width: "560px",
        }
    },
    oldSizeStyle: false,
    mobileFirst: false
};

smartgrid('./src/less', settings);