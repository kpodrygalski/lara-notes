<script setup>
import NoteComponentList from '../Components/NoteComponentList.vue';

const props = defineProps({
    notes: Array
});

</script>

<template>
    <div class="container my-3">
        <NoteComponentList :notes="notes" />
    </div>
</template>

<style>

</style>
