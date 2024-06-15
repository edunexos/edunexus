import { ComposableMap, Geographies, Geography } from "react-simple-maps";
import worldData from "../data/world.json";
import PropTypes from "prop-types";

const GeoGame = ({ onCountryClick, guessedCountry }) => {
    if (!worldData || !worldData.features) {
        console.error("world.json no se ha cargado correctamente o no tiene la estructura correcta.");
        return <div>Error al cargar el mapa.</div>;
    }

    return (
        <ComposableMap>
            <Geographies geography={worldData}>
                {({ geographies }) =>
                    geographies.map((geo) => {
                        const isGuessed = guessedCountry.includes(geo.properties.name);
                        return (
                            <Geography
                                key={geo.rsmKey}
                                geography={geo}
                                onClick={() => onCountryClick(geo.properties.name)}
                                style={{
                                    default: {
                                        fill: isGuessed ? "#4CAF50" : "#D6D6DA",
                                        outline: "none",
                                    },
                                    hover: { fill: "#F53", outline: "none" },
                                    pressed: { fill: "#E42", outline: "none" },
                                }}
                            />
                        );
                    })
                }
            </Geographies>
        </ComposableMap>
    );
};

GeoGame.propTypes = {
    onCountryClick: PropTypes.func.isRequired,
    guessedCountry: PropTypes.array.isRequired,
};

export default GeoGame;
