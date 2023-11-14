CREATE VIEW user_recipe_names AS
SELECT recetas.receta_id,recetas.receta_foto, recetas.receta_nombre, recetas.receta_type, recetas.receta_instrucciones,recetas.receta_diabetico, recetas.receta_vegan, recetas.receta_lactosa, recetas.receta_gluten, users_fav_food.id
FROM recetas
JOIN users_fav_food ON recetas.receta_id = users_fav_food.receta_id;