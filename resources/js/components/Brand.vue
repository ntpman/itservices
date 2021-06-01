<template>
    <div>
        <h1>Hello Brand with Vue</h1>
    </div>
</template>

<script>
export default {
    data() {
        return {
            brands: [],
            brand: {
                id: "",
                brand_full_name: "",
                brand_abbr_name: "",
            },
            brand_id: "",
            pagination: {},
            edit: false,
        };
    },
    mounted() {
        this.getBrandData();
    },
    methods: {
        getBrandData() {
            axios.get("/api/brands").then((res) => {
                this.brands = res.data;
            });
        },
    },
};
</script>
