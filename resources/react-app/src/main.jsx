import React from "react";
import { createRoot } from "react-dom/client";
import GeoGuesser from "./App";
import "./index.css";

const container = document.getElementById("react-app");
const root = createRoot(container);
root.render(
    <React.StrictMode>
        <GeoGuesser />
    </React.StrictMode>
);
