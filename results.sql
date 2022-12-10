SELECT fs2.form_id,
       fs1.group_id,
       fs1.ip,
       fs1.date,
       fs2.element_value as tree_code,
       fs3.element_value as email,
       fs1.element_value as verified
FROM `jdf8248d_formmaker_submits` fs1
       LEFT JOIN jdf8248d_formmaker_submits fs2 ON fs1.group_id = fs2.group_id AND fs2.element_label = 7
       LEFT JOIN jdf8248d_formmaker_submits fs3 ON fs1.group_id = fs3.group_id AND fs3.element_label = 9
WHERE fs1.form_id IN (19, 20)
  AND fs1.element_label = 'verifyInfo'
ORDER BY `fs2`.`form_id` ASC
