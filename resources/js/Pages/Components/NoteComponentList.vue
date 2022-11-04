<script setup>
const props = defineProps({
    notes: Array
});


</script>

<template>
    <div class="card mb-3" v-for="(note, index) in notes" :key="index">
        <div class="card-body">
            <h5 class="card-title font-semibold uppercase">[{{ note.id }}] {{ note.title }}</h5>
            <hr />
            <p class="card-text">
                {{ note.is_completed ? "Zakończone" : "Nie zakończone" }}
            </p>
        </div>
    </div>
</template>

