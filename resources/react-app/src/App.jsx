import { useEffect, useState } from "react";
import GeoGame from "./components/GeoGame";
import axios from "axios";
import worldData from "./data/world.json";
import "./App.css";

const GeoGuesser = () => {
    const [score, setScore] = useState(0);
    const [randomCountry, setRandomCountry] = useState("");
    const [guessedCountry, setGuessedCountry] = useState([]);
    const [attempts, setAttempts] = useState(0);
    const [gameOver, setGameOver] = useState(false);
    const [rounds, setRounds] = useState(0);

    const params = new URLSearchParams(window.location.search);
    const user_id = params.get("user_id");

    const countries = worldData.features.map((pais) => pais.properties.name);

    useEffect(() => {
        if (countries.length > 0) {
            generateRandomCountry();
        }
    }, [countries]);

    useEffect(() => {
        if (rounds === 5) {
            alert("Has jugado 5 rondas, fin del juego");
            setGameOver(true);
        }
    }, [rounds]);

    useEffect(() => {
        if (gameOver) {
            saveScore();
        }
    }, [gameOver]);

    const generateRandomCountry = () => {
        const randomIndex = Math.floor(Math.random() * countries.length);
        setRandomCountry(countries[randomIndex]);
        console.log("Random country: ", countries[randomIndex]);
    };

    const onCountryClick = (country) => {
        if (randomCountry === country) {
            console.log("Correcto");
            setScore(score + 1);
            setRounds(rounds + 1);
            setGuessedCountry([...guessedCountry, country]);
            generateRandomCountry();
            setAttempts(0);
        } else {
            setAttempts(attempts + 1);
            if (attempts >= 2) {
                setRounds(rounds + 1);
                generateRandomCountry();
                setAttempts(0);
            }
        }
    };

    const saveScore = async () => {
        const formatDateForMySQL = (date) => date.toISOString().slice(0, 19).replace("T", " ");

        const startTime = new Date();
        const endTime = new Date();

        try {
            const response = await axios.post("http://127.0.0.1:8000/api/game-results", {
                game_id: 3,
                user_id: user_id,
                score: score,
                start_time: formatDateForMySQL(startTime),
                end_time: formatDateForMySQL(endTime),
            });
            console.log(response.data);
        } catch (error) {
            console.error(error);
        }
    };

    return (
        <>
            <div className="p-4 bg-emerald-400">
                <h1 className="font-bold text-center text-3xl">Geo Guesser</h1>
            </div>
            <div className="p-4 flex justify-between">
                <p className="font-bold text-lg">Country: {randomCountry}</p>
                <p className="font-bold text-lg">Score: {score}</p>
            </div>
            <GeoGame onCountryClick={onCountryClick} guessedCountry={guessedCountry} />
        </>
    );
};

export default GeoGuesser;
