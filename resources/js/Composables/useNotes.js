import axios from "axios";
import { ref } from "vue";

const useNotes = () => {
    const notes = ref([]);
    const error = ref(null);
    const isLoading = ref(true);

    const fetchNotesFromDb = async () => {
        try {
            const res = await axios.get("/api/notes/");

            if (res.status !== 200) {
                throw new Error("Some error");
            }

            const data = await res.data.notes;
            notes.value = data;
            isLoading.value = false;
        } catch (err) {
            error.value = err.message;
            alert(error.value);
        }
    };

    return { notes, error, isLoading, fetchNotesFromDb };
};

export default useNotes;
