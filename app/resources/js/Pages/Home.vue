<template>
    <h1>Hello, {{ name }}</h1>
</template>

<script>
export default {
    name: "Home",
    props: {
        name: String,
        frameworks: []
    }
}
</script>
